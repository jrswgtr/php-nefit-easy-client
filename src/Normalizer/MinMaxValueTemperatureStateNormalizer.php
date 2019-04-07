<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\Exception\InvalidDataArrayException;
use Wagter\NefitEasyClient\State\MinMaxValueTemperatureState;
use Wagter\NefitEasyClient\State\State;

class MinMaxValueTemperatureStateNormalizer extends FloatValueStateNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$state instanceof MinMaxValueTemperatureState ) {
            return;
        }
        
        if ( !isset( $data['unitOfMeasure'] ) ) {
            throw new InvalidDataArrayException( 'unitOfMeasure' );
        }
        
        $state->setUnitOfMeasure( $data['unitOfMeasure'] );
        
        if ( !isset( $data['minValue'] ) ) {
            throw new InvalidDataArrayException( 'minValue' );
        }
        
        $state->setMinValue( $data['minValue'] );
        
        if ( !isset( $data['maxValue'] ) ) {
            throw new InvalidDataArrayException( 'maxValue' );
        }
        
        $state->setMaxValue( $data['maxValue'] );
        
        parent::denormalize( $state, $data );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        return $state instanceof MinMaxValueTemperatureState;
    }
}