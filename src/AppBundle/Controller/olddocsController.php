<?php

namespace AppBundle\Controller;

use AppBundle\Repository\docsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Docs;

class olddocsController extends Controller
{
    /**
     * Create a Post
     * @Route("/api/post/new", name="newPost")
     * @Method("POST")
     * @param $request Request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $doc = new Docs();
        $post = json_decode($request->getContent());

        return new Response('<pre>' . print_r($post, true));
    }
}
