<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Docs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\DocsType;

/**
 * Doc controller.
 *
 * @Route("docs")
 */
class DocsController extends Controller
{
    /**
     * Lists all doc entities.
     *
     * @Route("/", name="docs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $docs = $em->getRepository('AppBundle:Docs')->findAll();

        return $this->render('docs/index.html.twig', array(
            'docs' => $docs,
        ));
    }

    /**
     * Creates a new doc entity.
     *
     * @Route("/new", name="docs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $doc = new Docs();
        $form = $this->createForm('AppBundle\Form\DocsType', $doc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($doc);
            $em->flush();

            return $this->redirectToRoute('docs_show', array('id' => $doc->getId()));
        }

        return $this->render('docs/new.html.twig', array(
            'doc' => $doc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a doc entity.
     *
     * @Route("/{id}", name="docs_show")
     * @Method("GET")
     */
    public function showAction(Docs $doc)
    {
        $deleteForm = $this->createDeleteForm($doc);

        return $this->render('docs/show.html.twig', array(
            'doc' => $doc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing doc entity.
     *
     * @Route("/{id}/edit", name="docs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Docs $doc)
    {
        $deleteForm = $this->createDeleteForm($doc);
        $editForm = $this->createForm('AppBundle\Form\DocsType', $doc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('docs_edit', array('id' => $doc->getId()));
        }

        return $this->render('docs/edit.html.twig', array(
            'doc' => $doc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a doc entity.
     *
     * @Route("/{id}", name="docs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Docs $doc)
    {
        $form = $this->createDeleteForm($doc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($doc);
            $em->flush();
        }

        return $this->redirectToRoute('docs_index');
    }

    /**
     * Creates a form to delete a doc entity.
     *
     * @param Docs $doc The doc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Docs $doc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('docs_delete', array('id' => $doc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
