<?php

namespace PhoneBundle\Controller;


use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProductController extends EmController
{
    /**
     * @Route("/list/{model}", name="list_product")
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
          $brand = $list[0]->getBrand()->getName();
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
            2
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
     * @Route("/product/{slug}", name="product_sl")
     */
    public function showAction($slug)
    {
        $data = self::$em->getRepository('PhoneBundle:Product')
            ->findOneBy(["slug" => $slug]);

        if(!$data) {
            throw new NotFoundHttpException("This article does not exist");
        }

        return $this->render(
            'pages/product.html.twig', [
            "data" => $data
        ]);
    }
}
