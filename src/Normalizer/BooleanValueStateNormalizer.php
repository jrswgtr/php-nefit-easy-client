<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\State\BooleanValueState;
use Wagter\NefitEasyClient\State\State;

class BooleanValueStateNormalizer extends AbstractStateNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize( State $state ): array
    {
        if ( !$state instanceof BooleanValueState ) {
            throw new UnNormalizableStateException( $this, $state );
        }
        
        return [ 'value' => $state->getValue() ? 'true' : 'false' ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$state instanceof BooleanValueState ) {
            throw new UnDenormalizableStateException( $this, $state );
        }
        
        $this->setData( $data, 'value', function ( $value ) use ( $state ) {
            
            $state->setValue( $value === 'true' );
        } );
        
        parent::denormalize( $state, $data );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        return $state instanceof BooleanValueState;
    }
}