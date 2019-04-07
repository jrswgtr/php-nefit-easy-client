<?php

namespace Wagter\NefitEasyClient\Client;

class CurlClient implements HttpClient
{
    private $baseUrl;
    
    /**
     * CurlClient constructor.
     *
     * @param $baseUrl
     */
    public function __construct( $baseUrl )
    {
        $this->baseUrl = $baseUrl;
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function get( string $path ): array
    {
        $ch  = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $this->getUrl($path) );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec( $ch );
        curl_close( $ch );
        var_dump($path);
        var_dump($output);
        $results = json_decode( $output, true );
        return $results !== null ? $results : [];
    }
    
    /**
     * {@inheritdoc}
     */
    public function post( string $path, array $data ): bool
    {
        
        $payload = json_encode( $data );
    
        $headers = [
            'Content-Type: application/json',
            'Content-Length: ' . strlen( $payload ),
        ];
    
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $this->getUrl($path) );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
    
        $result = curl_exec( $ch );
        curl_close( $ch );
    
        return true;
    }
    
    private function getUrl( string $path )
    {
        return $this->baseUrl . $path;
    }
}