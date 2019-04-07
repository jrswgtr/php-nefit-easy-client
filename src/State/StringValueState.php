<?php

namespace Wagter\NefitEasyClient\State;

abstract class StringValueState extends AbstractState
{
    /**
     * @var string
     */
    private $value;
    
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    
    /**
     * @param string $value
     *
     * @return StringValueState
     */
    public function setValue( string $value ): StringValueState
    {
        $this->value = $value;
        
        return $this;
    }
}