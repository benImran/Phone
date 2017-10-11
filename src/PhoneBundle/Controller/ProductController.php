<?php

namespace PhoneBundle\Controller;


use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProductController extends EmController
{
    /**
     * @Route("/list/{brand}/{model}", name="list_product")
     */
    public function listAction(Request $request)
    {
        $model = $request->attributes->get('model');
        $listmodel = self::$em->getRepository('PhoneBundle:Model');
        $querymod = $listmodel->createQueryBuilder('mod')
                             ->where('mod.name = :name')
                             ->setParameter('name', $model)
                             ->getQuery();
        $mod = $querymod->getResult();

        $listproduct = self::$em->getRepository('PhoneBundle:Product');
        $query = $listproduct->createQueryBuilder('prod')
                             ->where('prod.models = :model')
                             ->setParameter('model', $mod)
                             ->orderBy('prod.id', 'DESC')
                             ->getQuery();
        $list = $query->getResult();

        if (!empty($list)) {
          $brand = $request->attributes->get('brand');;
        } else {
          $brand = "Aucun Produit Associé";
        }

        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');

//        $product = self::$em->getRepository('PhoneBundle:Product')
//           ->findOneBy(['id' => 'DESC']);

        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('pages/list_product.html.twig', [
                "pagination" => $pagination,
                // "product" => $product,
                "model" => $model,
                "brand" => $brand
            ]
        );
    }

    /**
     * @Route("/list/search", name="search_product")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request)
    {
        $search = $_POST['search'];
        $listproduct = self::$em->getRepository('PhoneBundle:Product');
        $query = $listproduct->createQueryBuilder('prod')
            ->where('prod.title LIKE :title')
            ->setParameter('title', '%'.$search.'%')
            ->orderBy('prod.id', 'DESC')
            ->getQuery();
        $list = $query->getResult();
//        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');

//        $product = self::$em->getRepository('PhoneBundle:Product')
//           ->findOneBy(['id' => 'DESC']);

        $pagination = $paginator->paginate(
            $list
//            $request->query->getInt('page', 1),
//            3
        );

        return $this->render('pages/search.html.twig', [
                "pagination" => $pagination,
                "search" => $search,
                // "product" => $product,
            ]
        );
    }

    /**
     * @Route("/product/{slug}", name="product_sl")
     */
    public function showAction($slug)
    {
        $data = self::$em->getRepository('PhoneBundle:Product')
            ->findOneBy(["slug" => $slug]);

        $prodassoc = $data->getProdassoc();
        $produitid = $data->getId();
        $produits = self::$em->getRepository('PhoneBundle:Product');
        $query = $produits->createQueryBuilder('p')
            ->where('p IN (:prodassoc) AND p.id != :id')
            ->setParameter('prodassoc', $prodassoc)
            ->setParameter('id' , $produitid  )
            ->getQuery();
        $suggestion = $query->getResult();

        if(!$data) {
            throw new NotFoundHttpException("This article does not exist");
        }

        return $this->render(
            'pages/product.html.twig', [
            "data" => $data,
            "suggestion" => $suggestion
        ]);
    }
}
