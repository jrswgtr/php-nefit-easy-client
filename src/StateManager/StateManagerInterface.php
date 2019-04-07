<?php

namespace Wagter\NefitEasyClient\StateManager;

use Wagter\NefitEasyClient\Client\HttpClient;
use Wagter\NefitEasyClient\Exception\InvalidStateException;
use Wagter\NefitEasyClient\Exception\UnWriteableStateException;
use Wagter\NefitEasyClient\Normalizer\Normalizer;
use Wagter\NefitEasyClient\State\State;

interface StateManagerInterface
{
    /**
     *
     * @param string $stateClass
     *
     * @return State
     * @throws InvalidStateException
     */
    public function read( string $stateClass ): State;
    
    /**
     *
     * @param State $state
     *
     * @return StateManagerInterface
     * @throws UnWriteableStateException
     */
    public function write( State $state ): StateManagerInterface;
    
    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient;
    
    /**
     * @return Normalizer
     */
    public function getNormalizer(): Normalizer;
}