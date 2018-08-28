<?php

namespace PoLaKoSz\PortHu\DataAccessLayer;

interface IWebClient
{
    public function getSourceCode(string $url) : string;
}