<?php

namespace Wagter\NefitEasyClient\Exception;


class InvalidDataArrayException extends \Exception
{
    public function __construct( string $arrayKey )
    {
        parent::__construct( sprintf('The argument called $data not contain key \'%s\'', $arrayKey) );
    }
}