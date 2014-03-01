<?php

namespace Bolsa\InscriptosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bolsa\InscriptosBundle\Form\PreinscriptosType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BolsaInscriptosBundle:Default:index.html.twig', array());
    }
    
    public function new_preinscriptoAction()
    {
        $preinscripto = new \Bolsa\InscriptosBundle\Entity\Preinscriptos();
        $form = $this->createForm(new PreinscriptosType(), $preinscripto);
        return $this->render('BolsaInscriptosBundle:Default:new_preinscripto.html.twig', array(
        'form' => $form->createView(),
    ));
    }
}
