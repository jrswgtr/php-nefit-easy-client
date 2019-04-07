<?php

namespace Wagter\NefitEasyClient\Client;

interface HttpClient
{
    /**
     * Get array of data by a HTTP GET request
     *
     * @param string $path the path to the endpoint
     *
     * @return array the array of data
     */
    public function get( string $path ): array;
    
    /**
     * Post an array of data by a HTTP POST request
     *
     * @param string $path the path to the endpoint
     * @param array $data the array of data
     *
     * @return bool true if the request was successful
     */
    public function post( string $path, array $data ): bool;
}