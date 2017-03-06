<?php

namespace wise\OwnerBundle\Controller;

use wise\OwnerBundle\Entity\Locataire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Locataire controller.
 *
 */
class LocataireController extends Controller
{
    /**
     * Lists all locataire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $locataires = $em->getRepository('wiseOwnerBundle:Locataire')->findAll();

        return $this->render('wiseOwnerBundle:locataire:index.html.twig', array(
            'locataires' => $locataires,
        ));
    }

    /**
     * Creates a new locataire entity.
     *
     */
    public function newAction(Request $request)
    {
        $locataire = new Locataire();
        $form = $this->createForm('wise\OwnerBundle\Form\LocataireType', $locataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($locataire);
            $em->flush($locataire);

            return $this->redirectToRoute('locataire_show', array('id' => $locataire->getId()));
        }

        return $this->render('locataire/new.html.twig', array(
            'locataire' => $locataire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a locataire entity.
     *
     */
    public function showAction(Locataire $locataire)
    {
        $deleteForm = $this->createDeleteForm($locataire);

        return $this->render('locataire/show.html.twig', array(
            'locataire' => $locataire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing locataire entity.
     *
     */
    public function editAction(Request $request, Locataire $locataire)
    {
        $deleteForm = $this->createDeleteForm($locataire);
        $editForm = $this->createForm('wise\OwnerBundle\Form\LocataireType', $locataire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('locataire_edit', array('id' => $locataire->getId()));
        }

        return $this->render('locataire/edit.html.twig', array(
            'locataire' => $locataire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a locataire entity.
     *
     */
    public function deleteAction(Request $request, Locataire $locataire)
    {
        $form = $this->createDeleteForm($locataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($locataire);
            $em->flush($locataire);
        }

        return $this->redirectToRoute('locataire_index');
    }

    /**
     * Creates a form to delete a locataire entity.
     *
     * @param Locataire $locataire The locataire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Locataire $locataire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locataire_delete', array('id' => $locataire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
