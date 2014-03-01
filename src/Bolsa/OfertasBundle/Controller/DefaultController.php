<?php

namespace Bolsa\OfertasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BolsaOfertasBundle:Default:index.html.twig', array('name' => $name));
    }
}
