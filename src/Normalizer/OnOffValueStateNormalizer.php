<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\State\OnOffValueState;
use Wagter\NefitEasyClient\State\State;

class OnOffValueStateNormalizer extends AbstractStateNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize( State $state ): array
    {
        if ( !$state instanceof OnOffValueState ) {
            throw new UnNormalizableStateException( $this, $state );
        }
        
        return [ 'value' => $state->getValue() ? 'on' : 'off' ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$state instanceof OnOffValueState ) {
            throw new UnDenormalizableStateException( $this, $state );
        }
        
        $this->setData( $data, 'value', function ( $value ) use ( $state ) {
            
            $state->setValue( $value === 'on' );
        } );
        
        parent::denormalize( $state, $data );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        return $state instanceof OnOffValueState;
    }
}