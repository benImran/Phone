<?php

namespace PhoneBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FooterController extends Controller
{
    public function footerAction(EntityManagerInterface $em)
    {
        $foot = $em->getRepository('PhoneBundle:Footer')
            ->find(1);
        // dump($foot);
        // die();
        return $this->render('partials/_footer.html.twig', [
            "foot" => $foot
        ]);
    }
}
