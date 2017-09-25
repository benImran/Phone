<?php

namespace PhoneBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmController extends Controller
{
    protected static $em;

    /**
     * BaseController constructor.
     */
    public function __construct(EntityManagerInterface $em)
    {
        self::$em = $em;
    }

}
