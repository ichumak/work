<?php

namespace Iad\IadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Iad\IadBundle\Entity\Data;
use Iad\IadBundle\Form\DataType;

/**
 * Data controller.
 *
 * @Route("/number")
 */
class DataController extends Controller
{

    /**
     * Lists all Data entities.
     *
     * @Route("/", name="number")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IadIadBundle:Data')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Data entity.
     *
     * @Route("/", name="number_create")
     * @Method("POST")
     * @Template("IadIadBundle:Data:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Data();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('number_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Data entity.
     *
     * @param Data $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Data $entity)
    {
        $form = $this->createForm(new DataType(), $entity, array(
            'action' => $this->generateUrl('number_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Data entity.
     *
     * @Route("/new", name="number_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Data();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Data entity.
     *
     * @Route("/{id}", name="number_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IadIadBundle:Data')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Data entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Data entity.
     *
     * @Route("/{id}/edit", name="number_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IadIadBundle:Data')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Data entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Data entity.
    *
    * @param Data $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Data $entity)
    {
        $form = $this->createForm(new DataType(), $entity, array(
            'action' => $this->generateUrl('number_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Data entity.
     *
     * @Route("/{id}", name="number_update")
     * @Method("PUT")
     * @Template("IadIadBundle:Data:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IadIadBundle:Data')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Data entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('number_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Data entity.
     *
     * @Route("/{id}", name="number_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IadIadBundle:Data')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Data entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('number'));
    }

    /**
     * Creates a form to delete a Data entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('number_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
