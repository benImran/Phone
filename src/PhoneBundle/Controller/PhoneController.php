<?php

namespace PhoneBundle\Controller;

use PhoneBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PhoneController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new RegistrationType(),$user = null,array('test' => null));
        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
