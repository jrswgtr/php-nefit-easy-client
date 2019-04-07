<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\State\State;
use Wagter\NefitEasyClient\State\StringValueState;

class StringValueStateNormalizer extends AbstractStateNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$state instanceof StringValueState ) {
            return;
        }
        
        $this->setData( $data, 'value', function ( $value ) use ( $state ) {
            $state->setValue( (string)$value );
        } );
        
        parent::denormalize( $state, $data );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        return $state instanceof StringValueState;
    }
}