<?php

namespace Wagter\NefitEasyClient\Exception;

use Wagter\NefitEasyClient\Normalizer\Normalizer;
use Wagter\NefitEasyClient\State\State;

class UnNormalizableStateException extends \Exception
{
    public function __construct( Normalizer $normalizer, State $state )
    {
        parent::__construct( sprintf(
            'Normalizer class \'%s\' is unable to normalize \'%s\'',
            get_class( $normalizer ),
            get_class( $state ) )
        );
    }
}