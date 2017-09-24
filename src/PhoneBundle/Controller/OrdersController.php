<?php

namespace PhoneBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use JMS\Payment\CoreBundle\Plugin\Exception\Action\VisitUrl;
use JMS\Payment\CoreBundle\Plugin\Exception\ActionRequiredException;
use JMS\Payment\CoreBundle\PluginController\Result;
use PhoneBundle\Entity\Orders;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/orders")
 * @ORM\Entity
 * @ORM\Table(name="orders_controller")
 */
class OrdersController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/new/{amount}")
     */
    public function newAction($amount)
    {
        $em = $this->getDoctrine()->getManager();

        $orders = new Orders($amount);
        $em->persist($orders);
        $em->flush();

        return $this->redirect($this->generateUrl('app_orders_show',[
            'id' => $orders->getId()
        ]));
    }

    /**
     * @Route("/{id}/show)
     * @Template
     */
    public function showAction(Request $request, Orders $orders)
    {
        $form = $this->createForm(ChoosePaymentMethodType::class, null, [
            'amount' => $orders->getAmount(),
            'currency' => 'EUR'

        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ppc = $this->get('payment.plugin_controller');
            $ppc->createPaymentInstruction($instruction = $form->getData());

            $orders->setPaymentInstruction($instruction);

            $em = $this->getDoctrine()->getManager();
            $em->persist($orders);
            $em->flush();

            return $this->redirect($this->generateUrl('app_orders_paymentcreate', [
                'id' => $orders->getId(),
            ]));
        }

        return [
            'orders' => $orders,
            'form' => $form->createView(),
        ];
    }

    private function createPayment($orders) {

        $instruction = $orders->getPaymentInstruction();
        $pendingTransaction = $instruction->getPendingTransaction();

        if ($pendingTransaction !== null) {
            return $pendingTransaction->getPayment();
        }

        $ppc = $this->get('payment.plugin_controller');
        $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

        return $ppc->createPayment($instruction->getId(), $amount);

    }

    /**
     * @param Orders $orders
     * @Route("/{id}/payment/create)
     */
    public function paymentCreateAction(Orders $orders)
    {
        $payment = $this->createPayment($orders);

        $ppc = $this->get('payment.plugin_controller');
        $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

        if ($result->getStatus() === Result::STATUS_SUCCESS) {
            return $this->redirect($this->generateUrl('app_orders_paymentcomplete', [
                'id' => $orders->getId()
            ]));
        }

        if ($result->getStatus() === Result::STATUS_PENDING) {
            $ex = $result->getPluginException();

            if ($ex instanceof ActionRequiredException) {
                $action = $ex->getAction();

                if ($action instanceof VisitUrl) {
                    return $this->redirect($action->getUrl());
                }
            }
        }

        throw $result->getPluginException();
    }

    /**
     * @Route("/{id}/payment/complete")
     */
    public function paymentCompleteAction(Orders $orders)
    {
        return new Response('Payment complete');
    }
}
