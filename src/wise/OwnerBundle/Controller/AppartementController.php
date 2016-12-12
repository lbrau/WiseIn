<?php

namespace wise\OwnerBundle\Controller;

use wise\OwnerBundle\Entity\Appartement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Appartement controller.
 *
 */
class AppartementController extends Controller
{
    /**
     * Lists all appartement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $appartements = $em->getRepository('wiseOwnerBundle:Appartement')->findAll();

        return $this->render('appartement/index.html.twig', array(
            'appartements' => $appartements,
        ));
    }

    /**
     * Creates a new appartement entity.
     *
     */
    public function newAction(Request $request)
    {
        $appartement = new Appartement();
        $form = $this->createForm('wise\OwnerBundle\Form\AppartementType', $appartement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appartement);
            $em->flush($appartement);

            return $this->redirectToRoute('appartement_show', array('id' => $appartement->getId()));
        }

        return $this->render('appartement/new.html.twig', array(
            'appartement' => $appartement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a appartement entity.
     *
     */
    public function showAction(Appartement $appartement)
    {
        $deleteForm = $this->createDeleteForm($appartement);

        return $this->render('appartement/show.html.twig', array(
            'appartement' => $appartement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing appartement entity.
     *
     */
    public function editAction(Request $request, Appartement $appartement)
    {
        $deleteForm = $this->createDeleteForm($appartement);
        $editForm = $this->createForm('wise\OwnerBundle\Form\AppartementType', $appartement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('appartement_edit', array('id' => $appartement->getId()));
        }

        return $this->render('appartement/edit.html.twig', array(
            'appartement' => $appartement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a appartement entity.
     *
     */
    public function deleteAction(Request $request, Appartement $appartement)
    {
        $form = $this->createDeleteForm($appartement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($appartement);
            $em->flush($appartement);
        }

        return $this->redirectToRoute('appartement_index');
    }

    /**
     * Creates a form to delete a appartement entity.
     *
     * @param Appartement $appartement The appartement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Appartement $appartement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appartement_delete', array('id' => $appartement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
