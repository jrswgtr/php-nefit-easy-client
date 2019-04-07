<?php
/**
 * Created by PhpStorm.
 * User: joris
 * Date: 07/04/19
 * Time: 10:15
 */

namespace Wagter\NefitEasyClient\State\HeatingCircuits\Hc1\HolidayMode;

use Wagter\NefitEasyClient\State\OnOffValueState;

class Activated extends OnOffValueState
{
    
    public function getId(): string
    {
        return '/bridge/heatingCircuits/hc1/holidayMode/activated';
    }
}