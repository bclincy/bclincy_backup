<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Podcast;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Podcast controller.
 *
 * @Route("podcast")
 */
class PodcastController extends Controller
{
    /**
     * Lists all podcast entities.
     *
     * @Route("/", name="podcast_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $podcasts = $em->getRepository('AppBundle:Podcast')->findAll();

        return $this->render('podcast/index.html.twig', array(
            'podcasts' => $podcasts,
        ));
    }

    /**
     * Creates a new podcast entity.
     *
     * @Route("/new", name="podcast_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $podcast = new Podcast();
        $form = $this->createForm('AppBundle\Form\PodcastType', $podcast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($podcast);
            $em->flush();

            return $this->redirectToRoute('podcast_show', array('id' => $podcast->getId()));
        }

        return $this->render('podcast/new.html.twig', array(
            'podcast' => $podcast,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a podcast entity.
     *
     * @Route("/{id}", name="podcast_show")
     * @Method("GET")
     */
    public function showAction(Podcast $podcast)
    {
        $deleteForm = $this->createDeleteForm($podcast);

        return $this->render('podcast/show.html.twig', array(
            'podcast' => $podcast,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing podcast entity.
     *
     * @Route("/{id}/edit", name="podcast_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Podcast $podcast)
    {
        $deleteForm = $this->createDeleteForm($podcast);
        $editForm = $this->createForm('AppBundle\Form\PodcastType', $podcast);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('podcast_edit', array('id' => $podcast->getId()));
        }

        return $this->render('podcast/edit.html.twig', array(
            'podcast' => $podcast,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a podcast entity.
     *
     * @Route("/{id}", name="podcast_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Podcast $podcast)
    {
        $form = $this->createDeleteForm($podcast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($podcast);
            $em->flush();
        }

        return $this->redirectToRoute('podcast_index');
    }

    /**
     * Creates a form to delete a podcast entity.
     *
     * @param Podcast $podcast The podcast entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Podcast $podcast)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('podcast_delete', array('id' => $podcast->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
