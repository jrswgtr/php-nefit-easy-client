<?php

namespace Wagter\NefitEasyClient\State\HeatingCircuits\Hc1;

use Wagter\NefitEasyClient\State\StringValueState;

class Control extends StringValueState
{
    public function getId(): string
    {
        return '/bridge/heatingCircuits/hc1/control';
    }
}