<?php

namespace Wagter\NefitEasyClient\StateManager;


use Wagter\NefitEasyClient\Client\HttpClient;
use Wagter\NefitEasyClient\Normalizer\Normalizer;
use Wagter\NefitEasyClient\State\State;

abstract class AbstractStateManager implements StateManagerInterface
{
    /**
     * @var HttpClient
     */
    private $client;
    
    /**
     * @var Normalizer
     */
    private $normalizer;
    
    /**
     * StateManager constructor.
     *
     * @param HttpClient $client
     * @param Normalizer $normalizer
     */
    public function __construct( HttpClient $client, Normalizer $normalizer )
    {
        $this->client     = $client;
        $this->normalizer = $normalizer;
    }
    
    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return $this->client;
    }
    
    /**
     * @return Normalizer
     */
    public function getNormalizer(): Normalizer
    {
        return $this->normalizer;
    }
    
    /**
     * @param string $className
     *
     * @return bool
     */
    protected function isStateClass( string $className ): bool
    {
        return class_exists( $className ) && in_array( State::class, class_implements( $className ) );
    }
}