<?php

namespace Wagter\NefitEasyClient\Exception;

use Wagter\NefitEasyClient\State\State;

class InvalidStateException extends \Exception
{
    /**
     * InvalidModelException constructor.
     *
     * @param string $className
     */
    public function __construct( string $className )
    {
        parent::__construct(
            sprintf(
                'Class %s name does not implement %s',
                $className,
                State::class
            )
        );
    }
}