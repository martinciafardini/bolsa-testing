<?php

namespace Bolsa\InscriptosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bolsa\InscriptosBundle\Entity\Inscriptos;
use Bolsa\InscriptosBundle\Form\InscriptosType;

/**
 * Inscriptos controller.
 *
 */
class InscriptosController extends Controller
{

    /**
     * Lists all Inscriptos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BolsaInscriptosBundle:Inscriptos')->findAll();

        return $this->render('BolsaInscriptosBundle:Inscriptos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    private function setSecurePassword(&$entity) 
    {
	$entity->setSalt(md5(time()));
	$encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
	$password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
	$entity->setPassword($password);
    }
    
    /**
     * Creates a new Inscriptos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Inscriptos();
        $form = $this->createCreateForm($entity);
        //creo a mano los campos que faltan
        $entity->setModificado(new \DateTime());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->setSecurePassword($entity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backend_inscriptos_show', array('id' => $entity->getId())));
        }

        return $this->render('BolsaInscriptosBundle:Inscriptos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Inscriptos entity.
    *
    * @param Inscriptos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Inscriptos $entity)
    {
        $form = $this->createForm(new InscriptosType(), $entity, array(
            'action' => $this->generateUrl('backend_inscriptos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Inscriptos entity.
     *
     */
    public function newAction()
    {
        $entity = new Inscriptos();
        $form   = $this->createCreateForm($entity);

        return $this->render('BolsaInscriptosBundle:Inscriptos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Inscriptos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BolsaInscriptosBundle:Inscriptos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscriptos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BolsaInscriptosBundle:Inscriptos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Inscriptos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BolsaInscriptosBundle:Inscriptos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscriptos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BolsaInscriptosBundle:Inscriptos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Inscriptos entity.
    *
    * @param Inscriptos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Inscriptos $entity)
    {
        $form = $this->createForm(new InscriptosType(), $entity, array(
            'action' => $this->generateUrl('backend_inscriptos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Inscriptos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BolsaInscriptosBundle:Inscriptos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Inscriptos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        //Obtengo la passwd actual
        $current_pass = $entity->getPassword();
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
            //evalua si la contraseña fue modificada
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('backend_inscriptos_edit', array('id' => $id)));
        }

        return $this->render('BolsaInscriptosBundle:Inscriptos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Inscriptos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BolsaInscriptosBundle:Inscriptos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Inscriptos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend_inscriptos'));
    }

    /**
     * Creates a form to delete a Inscriptos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backend_inscriptos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
