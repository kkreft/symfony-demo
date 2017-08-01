<?php

namespace AppBundle\ToggleFeature;

use GuzzleHttp\Client;
use Qandidate\Toggle\Context;
use Qandidate\Toggle\ContextFactory;

class GeolocationContextFactory extends ContextFactory
{
    /**
     * {@inheritDoc}
     */
    public function createContext()
    {
        $context = new Context();
        $client = new Client(['base_uri' => 'http://ip-api.com/json/']);

        $response = $client->get('208.80.152.201');
//        $response = $client->get('31.11.129.107'); // IP from Poland

        $response =  json_decode($response->getBody()->getContents());

        $context->set('country', $response->country);

        return $context;
    }
}