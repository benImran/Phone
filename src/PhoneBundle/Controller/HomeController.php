<?php

namespace PhoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HomeController extends Controller
{
    /**
     * @Route("/sdvq")
     */
    public function indexAction()
    {
        return $this->render('pages/home.html.twig');
    }

}
