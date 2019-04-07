<?php

namespace Wagter\NefitEasyClient\Exception;

use Wagter\NefitEasyClient\State\State;

class UnWriteableStateException extends \Exception
{
    public function __construct( State $model )
    {
        parent::__construct( sprintf('%s is a non-writeable model', get_class($model) ) );
    }
}