<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\Exception\InvalidDataArrayException;
use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\State\State;

interface Normalizer
{
    /**
     * Normalize a State instance to an array
     *
     * @param State $state the State instance to normalize
     *
     * @return array the normalized array
     * @throws UnNormalizableStateException if the State instance cannot be normalized by this Normalizer
     */
    public function normalize( State $state ): array;
    
    /**
     * Denormalize a data array into a State instance
     *
     * @param State $state the State instance to denormalize into
     * @param array $data the data to denormalize
     *
     * @throws UnDenormalizableStateException if the State instance cannot be denormalized by this Normalizer
     * @throws InvalidDataArrayException if the array of data does not contain the required keys
     */
    public function denormalize( State $state, array $data );
    
    /**
     * Check if a State instance can be normalized / denormalized by this Normalizer
     *
     * @param State $state the State instance to check
     *
     * @return bool true if the State instance can be normalized / denormalized by this Normalizer
     */
    public function canNormalize( State $state ): bool;
}