<?php

namespace AppBundle\Controller;


use AppBundle\Services\Flickr;
use GuzzleHttp\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('@App/index.html.twig', ['title' =>'The man']);
    }

    /**
     * About Page
     * @Route("about/", name="about")
     */
    public function aboutAction()
    {
        return $this->render('@App/default/index.html.twig', ['title' =>'building the man']);
    }
}
