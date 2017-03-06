<?php

namespace wise\OwnerBundle\Controller;

use wise\OwnerBundle\Entity\Proprietaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Proprietaire controller.
 *
 */
class ProprietaireController extends Controller
{
    /**
     * Lists all proprietaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proprietaires = $em->getRepository('wiseOwnerBundle:Proprietaire')->findAll();

        return $this->render('proprietaire/index.html.twig', array(
            'proprietaires' => $proprietaires,
        ));
    }

    /**
     * Creates a new proprietaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $proprietaire = new Proprietaire();
        $form = $this->createForm('wise\OwnerBundle\Form\ProprietaireType', $proprietaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proprietaire);
            $em->flush($proprietaire);

            return $this->redirectToRoute('proprietaire_show', array('id' => $proprietaire->getId()));
        }

        return $this->render('proprietaire/new.html.twig', array(
            'proprietaire' => $proprietaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proprietaire entity.
     *
     */
    public function showAction(Proprietaire $proprietaire)
    {
        $deleteForm = $this->createDeleteForm($proprietaire);

        return $this->render('proprietaire/show.html.twig', array(
            'proprietaire' => $proprietaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proprietaire entity.
     *
     */
    public function editAction(Request $request, Proprietaire $proprietaire)
    {
        $deleteForm = $this->createDeleteForm($proprietaire);
        $editForm = $this->createForm('wise\OwnerBundle\Form\ProprietaireType', $proprietaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proprietaire_edit', array('id' => $proprietaire->getId()));
        }

        return $this->render('proprietaire/edit.html.twig', array(
            'proprietaire' => $proprietaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proprietaire entity.
     *
     */
    public function deleteAction(Request $request, Proprietaire $proprietaire)
    {
        $form = $this->createDeleteForm($proprietaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proprietaire);
            $em->flush($proprietaire);
        }

        return $this->redirectToRoute('proprietaire_index');
    }

    /**
     * Creates a form to delete a proprietaire entity.
     *
     * @param Proprietaire $proprietaire The proprietaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proprietaire $proprietaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proprietaire_delete', array('id' => $proprietaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Generate owner left menu
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generateLeftMenuAction(Request $request)
    {
        dump($request->attributes);
        return $this->render('@wiseOwner/menu/main_menu.html.twig');
    }
}
