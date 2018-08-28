<?php

namespace PoLaKoSz\PortHu\DataAccessLayer;

class WebClient implements IWebClient
{
    public function getSourceCode(string $url) : string {
        return file_get_contents( $url );
    }
}