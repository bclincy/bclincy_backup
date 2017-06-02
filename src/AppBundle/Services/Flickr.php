<?php

namespace AppBundle\Services;

/**
 * Class Flickr
 * @package AppBundle\Services
 */

use GuzzleHttp\Client;
use Symfony\Bridge\Monolog\Logger;

class Flickr {
    /**
     * @var
     */
    private $client;
    /**
     * @var
     */
    private $logger;

    private $url;

    /**
     * @param client $client
     * @param logger $logger
     */
    public function __construct(Client $client, Logger $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->url    = 'https://api.flickr.com/services/feeds/photos_public.gne?format=json&nojsoncallback=1&tags=';
    }

    public function getNewPublicImages (array $tags)
    {
        $tags = implode(',', $tags);
        $res = $this->client->request('GET', $this->url . $tags);
        return  json_decode($res->getBody());

    }
}