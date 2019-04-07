<?php

namespace Wagter\NefitEasyClient\StateManager;

use Wagter\NefitEasyClient\Exception\InvalidDataArrayException;
use Wagter\NefitEasyClient\Exception\InvalidStateException;
use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnWriteableStateException;
use Wagter\NefitEasyClient\State\State;

class StateManager extends AbstractStateManager
{
    
    /**
     * Read a State instance
     *
     * @param string $stateClass the State class to request an instance of
     *
     * @return State the requested State instance
     *
     * @throws InvalidStateException if the requested class does not implement State
     * @throws UnDenormalizableStateException if the State is not denormalizable
     * @throws InvalidDataArrayException if the loaded data array has an invalid format
     */
    public function read( string $stateClass ): State
    {
        if ( !$this->isStateClass( $stateClass ) ) {
            throw new InvalidStateException( $stateClass );
        }
    
        /** @var State $state */
        $state = new $stateClass();
        $data  = $this->getClient()->get( $state->getId() );
    
        $this->getNormalizer()->denormalize( $state, $data );
    
        return $state;
    }
    
    /**
     * Write a State instance
     *
     * @param State $state the State instance to write
     *
     * @return StateManagerInterface self
     *
     * @throws UnWriteableStateException if the State instance is not writable
     * @throws UnNormalizableStateException if the State instance is not normalizable
     */
    public function write( State $state ): StateManagerInterface
    {
        if ( !$state->isWriteable() ) {
            throw new UnWriteableStateException( $state );
        }
        
        $this->getClient()->post(
            $state->getId(),
            $this->getNormalizer()->normalize( $state )
        );
        
        return $this;
    }
}