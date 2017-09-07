<?php

namespace AppBundle\Controller\api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use GuzzleHttp\Client;
use AppBundle\Services\Flickr;

class ApiController extends Controller
{
    /**
     * @Route("api", name="api")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:default:index.html.twig', array('name' => 'hope', 'pageTag' => 'About Us'));
    }

    /**
     * @Route("/flickr/{tags}", name="api_flickr")
     * @Method("GET")
     */
    public function picFromFlckr ($tags = null)
    {
        $client = new Client();
        $flickr = new Flickr($client, $this->get('logger'));
        $res = $flickr->getNewPublicImages(['greens, gardens']);
        return new Response(var_dump($res));
    }

    /**
     * @Route("/newsletter/signup/{token}", name="saveNewsletter")
     * @Method("POST")
     */
    public function newsletterAction(Request $request, $token)
    {
        $content = $this->get("request")->getContent();
        if (!empty($content))
        {
            die($content. $request);

        }
        die('not dead');
    }
}
