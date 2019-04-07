<?php

namespace Wagter\NefitEasyClient\State;

abstract class FloatValueState extends AbstractState
{
    /**
     * @var float
     */
    private $value;
    
    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
    
    /**
     * @param float $value
     *
     * @return FloatValueState
     */
    public function setValue( float $value ): FloatValueState
    {
        $this->value = $value;
        
        return $this;
    }
}