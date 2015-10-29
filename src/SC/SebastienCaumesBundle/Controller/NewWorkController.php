<?php

namespace SC\SebastienCaumesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SC\SebastienCaumesBundle\Entity\NewWork;
use SC\SebastienCaumesBundle\Form\NewWorkType;

//CRUD Generated controller after my fromscratch

/**
 * NewWork controller.
 *
 */
class NewWorkController extends Controller
{

    /**
     * Lists all NewWork entities.
     *
     */
    public function indexAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, "Vous devez être administrateur pour entrer ici :)");


        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        if($this->getUser()){
            //...
        }

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SCSebastienCaumesBundle:NewWork')->findAll();

        return $this->render('SCSebastienCaumesBundle:NewWork:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new NewWork entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NewWork();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newwork_show', array('id' => $entity->getId())));
        }

        return $this->render('SCSebastienCaumesBundle:NewWork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NewWork entity.
     *
     * @param NewWork $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NewWork $entity)
    {
        $form = $this->createForm(new NewWorkType(), $entity, array(
            'action' => $this->generateUrl('newwork_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));
        $form->add('Envoyer', 'submit', array('attr' => array('class' => 'btn btn-danger'),));

        return $form;
    }

    /**
     * Displays a form to create a new NewWork entity.
     *
     */
    public function newAction()
    {
        $entity = new NewWork();
        $form   = $this->createCreateForm($entity);

        return $this->render('SCSebastienCaumesBundle:NewWork:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NewWork entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCSebastienCaumesBundle:NewWork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewWork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCSebastienCaumesBundle:NewWork:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NewWork entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCSebastienCaumesBundle:NewWork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewWork entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCSebastienCaumesBundle:NewWork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NewWork entity.
    *
    * @param NewWork $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NewWork $entity)
    {
        $form = $this->createForm(new NewWorkType(), $entity, array(
            'action' => $this->generateUrl('newwork_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));
        $form->add('Envoyer', 'submit', array('attr' => array('class' => 'btn btn-danger'),));


        return $form;
    }

    /**
     * Edits an existing NewWork entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCSebastienCaumesBundle:NewWork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewWork entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newwork_edit', array('id' => $id)));
        }

        return $this->render('SCSebastienCaumesBundle:NewWork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NewWork entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SCSebastienCaumesBundle:NewWork')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NewWork entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newwork'));
    }

    /**
     * Creates a form to delete a NewWork entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newwork_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('Supprimer', 'submit', array('attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}

