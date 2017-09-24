<?php

namespace PhoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WishlistController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
