<?php

namespace Bolsa\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Bolsa\FrontendBundle\Form\InscripcionType;
use Bolsa\InscriptosBundle\Entity\Preinscriptos;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BolsaFrontendBundle:Default:index.html.twig', array());
    }
    
    public function new_inscriptoAction()
    {
        $preinscripto = new \Bolsa\InscriptosBundle\Entity\Preinscriptos();
        $form = $this->createForm(new InscripcionType(), $preinscripto);
        return $this->render('BolsaFrontendBundle:Default:new_inscripto.html.twig', array(
        'form' => $form->createView(),
    ));
        //return new Response('lugar del formulario');
    }
    
    public function crear_inscriptoAction(Request $request)
    {
       //return new Response('inscripcion exitosa!');
        $request = $this->getRequest();
        $inscripto = new Preinscriptos();
        $form = $this->createForm(new InscripcionType(), $inscripto);
        if($request->getMethod() == 'POST'){
            $form->handleRequest($request);//este metodo carga el objeto articulo con lo que viene en el request
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($inscripto);
                $em->flush();
                //return new Response('inscripcion exitosa!');
                return $this->render("BolsaFrontendBundle:Default:inscripcionOk.html.twig", array());
            }
            else {return new Response('ERROR en la inscripcion!');}
        }   
        
    }
}
