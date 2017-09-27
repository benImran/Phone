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

        $categ = $em->getRepository('PhoneBundle:Category')
            ->findAll();

        $model = $em->getRepository('PhoneBundle:Model')
            ->findAll();

        $panier = $em->getRepository('PhoneBundle:Product')
            ->findAll();

        if(isset($_SESSION['panier'])){
          $paniercount = array_sum($_SESSION['panier']);
        }else {
          $paniercount = 0;
        }
        return $this->render('partials/_header.html.twig', [
            "navs" => $navs,
            "categ" => $categ,
            "model" => $model,
            "paniercount" => $paniercount,
            "panier" => $panier
        ]);

    }
}
