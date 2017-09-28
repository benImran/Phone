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


        if(isset($_SESSION['panier'])){
            $paniercount = array_sum($_SESSION['panier']);
            $idpanier = array_keys($_SESSION['panier']);
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('PhoneBundle:Product');
            $query = $produits->createQueryBuilder('p')
                ->where('p.id IN (:panier)')
                ->setParameter('panier', $idpanier)
                ->getQuery();
            $panier = $query->getResult();
            $qty = $_SESSION['panier'];
            $stock = [];
            foreach ($panier as $value) {
                array_push($stock, $value->getRate());
            }
            $test = array_combine(array_values($stock), array_values($qty));
            $total = 0;
            foreach ($test as $prix => $nbr) {
                $total = $total + ($prix * $nbr);
            }
        }else {
            $paniercount = 0;
            $panier = '<div class="cart-hover"><div class="cart-product"><div class="description"><div><h3>Panier Vide</h3></div></div></div></div>';
            $qty = 0;
            $total = 0;
        }
        return $this->render('partials/_header.html.twig', [
            "navs" => $navs,
            "categ" => $categ,
            "model" => $model,
            "paniercount" => $paniercount,
            'panier' => $panier,
            'qty' => $qty,
            'total' => $total,

        ]);

    }
}
