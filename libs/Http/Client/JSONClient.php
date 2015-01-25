<?php

namespace PirateGulf\Http\Client;

class JSONClient implements IClient
{

    /**
     * @var \Guzzle\Http\ClientInterface
     */
    private $guzzleClient;

    /**
     * @param \Guzzle\Http\ClientInterface $client
     */
    public function __construct(\Guzzle\Http\ClientInterface $client)
    {
        $this->guzzleClient = $client;
    }

    /**
     * @param string $url
     * @return array
     */
    public function get($url)
    {
        $request = $this->guzzleClient->get($url);
        $response = $request->send();
        return $response->json();
    }
}