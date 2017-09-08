<?php

namespace PhoneBundle\Controller;

use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function listActions(Request $request)
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
            'pages/product.html.twig', [
                "pagination" => $pagination
            ]
        );
    }
}
