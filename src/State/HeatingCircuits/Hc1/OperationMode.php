<?php

namespace Wagter\NefitEasyClient\State\HeatingCircuits\Hc1;


use Wagter\NefitEasyClient\State\StringValueState;

class OperationMode extends StringValueState
{
    const STATE_MANUAL = 'manual';
    
    const STATE_AUTO = 'auto';

    public function getId(): string
    {
        return '/bridge/heatingCircuits/hc1/operationMode';
    }
}