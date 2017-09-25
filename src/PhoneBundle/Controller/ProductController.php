<?php

namespace PhoneBundle\Controller;


use Knp\Component\Pager\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProductController extends BaseController
{
    /**
     * @Route("/list", name="list_product")
     */
    public function listAction(Request $request)
    {
        $listproduct = self::$em->getRepository('PhoneBundle:Product');
        $query = $listproduct->createQueryBuilder('prod')
            ->orderBy('prod.id', 'DESC')->getQuery();

        $list = $query->getResult();

        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');

        $product = self::$em->getRepository('PhoneBundle:Product')
           ->findOneBy(['id' => 'DESC']);

        $pagination = $paginator->paginate(
            $list,
            $request->query->getInt('page', 1),
            2
        );

        //dump($pagination->getItems()->getSlug());
        //die;
        return $this->render('pages/list_product.html.twig', [
                "pagination" => $pagination,
                "product" => $product
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
