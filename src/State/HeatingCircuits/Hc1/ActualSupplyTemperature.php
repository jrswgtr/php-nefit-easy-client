<?php

namespace Wagter\NefitEasyClient\State\HeatingCircuits\Hc1;

use Wagter\NefitEasyClient\State\MinMaxValueTemperatureState;

class ActualSupplyTemperature extends MinMaxValueTemperatureState
{
    public function getId(): string
    {
        return '/bridge/heatingCircuits/hc1/actualSupplyTemperature';
    }
}