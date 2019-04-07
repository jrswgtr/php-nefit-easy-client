<?php

namespace Wagter\NefitEasyClient\Client;

class DummyDataClient implements HttpClient
{
    /**
     * Array containing dummy data per path
     *
     * @var array
     */
    private $dummyData;
    
    /**
     * DummyDataClient constructor.
     *
     * @param array $dummyData
     */
    public function __construct( array $dummyData )
    {
        $this->dummyData = $dummyData;
    }
    
    /**
     * {@inheritdoc}
     */
    public function get( string $path ): array
    {
        $key = str_replace( '/bridge', '', $path );
        
        return isset( $this->dummyData[ $key ] ) ? $this->dummyData[ $key ] : [];
    }
    
    /**
     * {@inheritdoc}
     */
    public function post( string $path, array $data ): bool
    {
        $key = str_replace( '/bridge', '', $path );
        if ( isset( $this->dummyData[ $key ] ) ) {
            $this->dummyData = array_merge( $this->dummyData[ $key ], $data );
            
            return true;
        }
        
        return false;
    }
}