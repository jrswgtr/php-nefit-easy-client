<?php

namespace Wagter\NefitEasyClient\State;

abstract class BooleanValueState extends AbstractState
{
    /**
     * @var bool
     */
    private $value;
    
    /**
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }
    
    /**
     * @param bool $value
     *
     * @return BooleanValueState
     */
    public function setValue( bool $value ): BooleanValueState
    {
        $this->value = $value;
        
        return $this;
    }
}