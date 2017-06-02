<?php

/**
 * Flickr API connection service
 * @var string
 */

namespace AppBundle\Services;

class FlickrkApi
{

  private $client;
  private $logger;

  public function __construct(client $client,logger $logger)
  {
    $this->client = $client;
    $this->logger = $logger;
  }

  public function getNewPublicImages (array $tags)
  {
    $tags = implode(',', $tags);
    $res = $this->client->request('GET', 'https://api.flickr.com/services/feeds/photos_public.gne?format=json&nojsoncallback=1&tags=garden,food,greens');
    return  json_decode($res->getBody());

  }
}
