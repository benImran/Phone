<?php

namespace PhoneBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HeaderController extends Controller
{
    public function headerAction(EntityManagerInterface $em)
    {
        $navs = $em->getRepository('PhoneBundle:Brand')
            ->findAll();
        return $this->render('partials/_header.html.twig', [
            "navs" => $navs
        ]);
    }
}
