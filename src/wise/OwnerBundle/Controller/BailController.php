<?php

namespace wise\OwnerBundle\Controller;

use wise\OwnerBundle\Entity\Bail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bail controller.
 *
 */
class BailController extends Controller
{
    /**
     * Lists all bail entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bails = $em->getRepository('wiseOwnerBundle:Bail')->findAll();

        return $this->render('bail/index.html.twig', array(
            'bails' => $bails,
        ));
    }

    /**
     * Creates a new bail entity.
     *
     */
    public function newAction(Request $request)
    {
        $bail = new Bail();
        $form = $this->createForm('wise\OwnerBundle\Form\BailType', $bail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bail);
            $em->flush($bail);

            return $this->redirectToRoute('bail_show', array('id' => $bail->getId()));
        }

        return $this->render('bail/new.html.twig', array(
            'bail' => $bail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bail entity.
     *
     */
    public function showAction(Bail $bail)
    {
        $deleteForm = $this->createDeleteForm($bail);

        return $this->render('bail/show.html.twig', array(
            'bail' => $bail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bail entity.
     *
     */
    public function editAction(Request $request, Bail $bail)
    {
        $deleteForm = $this->createDeleteForm($bail);
        $editForm = $this->createForm('wise\OwnerBundle\Form\BailType', $bail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bail_edit', array('id' => $bail->getId()));
        }

        return $this->render('bail/edit.html.twig', array(
            'bail' => $bail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bail entity.
     *
     */
    public function deleteAction(Request $request, Bail $bail)
    {
        $form = $this->createDeleteForm($bail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bail);
            $em->flush($bail);
        }

        return $this->redirectToRoute('bail_index');
    }

    /**
     * Creates a form to delete a bail entity.
     *
     * @param Bail $bail The bail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bail $bail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bail_delete', array('id' => $bail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
