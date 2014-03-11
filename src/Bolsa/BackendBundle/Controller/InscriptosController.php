<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bolsa\BackendBundle\Controller;

use Bolsa\InscriptosBundle\Entity\Preinscriptos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class InscriptosController extends Controller
{
    public function listarPreinscriptosAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $preinscriptos = $em->getRepository('BolsaInscriptosBundle:Preinscriptos')->findAll();
        return $this->render('BolsaBackendBundle:Inscriptos:verPreinscriptos.html.twig', array(
        'preinscriptos' => $preinscriptos,
    ));
    }
}