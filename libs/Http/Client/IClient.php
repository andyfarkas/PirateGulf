<?php

namespace PirateGulf\Http\Client;

interface IClient
{
    /**
     * @param string $url
     * @return array
     */
    public function get($url);
}