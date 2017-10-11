<?php

namespace PhoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('pages/home.html.twig');
    }

    /**
     * @Route("/loginregister", name="login/register")
     */
    public function loginRegisterAction()
    {
        return $this->render('pages/login_register.html.twig');
    }

}
