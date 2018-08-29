<?php

namespace PoLaKoSz\PortHu;

use PoLaKoSz\PortHu\DataAccessLayer\IWebClient;
use PoLaKoSz\PortHu\DataAccessLayer\WebClient;
use PoLaKoSz\PortHu\Deserializers\MoviePageDeserializer;

abstract class Endpoint
{
    private $webClient;
    private $url;



    public function __construct(string $endpointAddress) {
        $this->webClient = new WebClient();

        $this->url = MoviePageDeserializer::BASE_URL . $endpointAddress;
    }



    protected function callAPI(string $query) : string {
        return $this->webClient->getSourceCode( $this->url . $query );
    }
}