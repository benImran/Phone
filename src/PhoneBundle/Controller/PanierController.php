<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

// @TODO SAMY Gerer les quantités

/**
 * Panier controller.
 *
 */
class PanierController extends Controller
{
  /**
   * Basket Page
   *
   * @Route("/panier", name="panier_index")
   * @Method({"GET", "POST"})
   */
  public function panierIndex(){
    if(!isset($_SESSION)){
      session_start();
    }
    if(!isset($_SESSION['panier'])){
      $_SESSION['panier'] = array();
    }
    $idpanier = array_keys($_SESSION['panier']);
    $em = $this->getDoctrine()->getManager();
    $produits = $em->getRepository('AppBundle:Produit');
    $query = $produits->createQueryBuilder('p')
                      ->where('p.id IN (:panier)')
                      ->setParameter('panier', $idpanier)
                      ->getQuery();
    $panier = $query->getResult();
    $qty = $_SESSION['panier'];
    // dump($qty);
    // die;
    return $this->render('pages/panier.html.twig', array(
        'panier' => $panier,
        'qty' => $qty,
    ));
  }

  /**
   * Add to basket
   *
   * @Route("/panier/add", name="panier_add")
   * @Method({"GET", "POST"})
   */
  public function panierAddAction(Request $request)
  {
    if(!isset($_SESSION)){
      session_start();
    }
    if(!isset($_SESSION['panier'])){
      $_SESSION['panier'] = array();
    }
    $em = $this->getDoctrine()->getManager();
    $produits = $em->getRepository('AppBundle:Produit');
    if(isset($_GET['id'])){
      $query = $produits->createQueryBuilder('p')
                        ->where('p.id = :id')
                        ->setParameter('id', $_GET['id'])
                        ->getQuery();
      $panier = $query->getResult();
      if (empty($panier)) {
        // Panier Vide
        die('lolol');
      }
      if (isset($_SESSION['panier'][$panier[0]->id])) {
        $_SESSION['panier'][$panier[0]->id]++;
      } else {
        $_SESSION['panier'][$panier[0]->id] = 1;
      }
      // dump($_SESSION);
      // die();
    } else {
      // Produit introuvable
      die('DIEEEEE');
    }
    return $this->redirectToRoute('panier_index');
  }

  /**
   * Delete From basket
   *
   * @Route("/panier/delete", name="panier_delete")
   * @Method({"GET", "POST"})
   */
  public function panierDeleteAction(Request $request)
  {
    $produitid = $request->query->get('id');
    unset($_SESSION['panier'][$produitid]);
    return $this->redirectToRoute('panier_index');
  }


  /**
   * Plus one To basket
   *
   * @Route("/panier/QtyUp", name="qty_up")
   * @Method({"GET", "POST"})
   */
  public function panierPlusAction(Request $request)
  {
    $produitid = $request->query->get('id');
    $_SESSION['panier'][$produitid]++;
    return $this->redirectToRoute('panier_index');
  }

  /**
   * Less one To basket
   *
   * @Route("/panier/QtyDown", name="qty_down")
   * @Method({"GET", "POST"})
   */
  public function panierLessAction(Request $request)
  {
    $produitid = $request->query->get('id');
    if ($_SESSION['panier'][$produitid] > 1) {
      $_SESSION['panier'][$produitid]--;
    } else {
      unset($_SESSION['panier'][$produitid]);
    }
    return $this->redirectToRoute('panier_index');
  }
}
