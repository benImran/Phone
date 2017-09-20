<?php

namespace PhoneBundle\Controller;

use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProductController extends BaseController
{
    /**
     * @Route("/listproduct", name="list_product")
     */
    public function listAction(Request $request)
    {
        $product = self::$em->getRepository('PhoneBundle::Product');
        $query = $product->createQueryBuilder('prod')
            ->orderBy('prod.id', 'DESC')->getQuery();

        $list = $query->getResult();

        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render(
            'pages/listproduct.html.twig', [
                "pagination" => $pagination
            ]
        );
    }

    /**
     * @Route("/product{slug}", name="product")
     */
    public function showAction($slug)
    {
        $data = self::$em->getRepository("PhoneBundle:Product")
                ->findOneBy(["slug" => $slug]);

        if(!$data) {
            throw new NotFoundHttpException("This article does not exist");
        }

        return $this->render(
            'pages/product.html.twig', [
                "data" => $data
            ]
        );

    }
}
