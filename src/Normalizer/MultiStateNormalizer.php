<?php

namespace Wagter\NefitEasyClient\Normalizer;

use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\State\State;

/**
 * Class StateNormalizer
 * @package Wagter\NefitEasyClient\Normalizer
 */
class MultiStateNormalizer implements Normalizer
{
    /**
     * @var Normalizer[]
     */
    private $normalizers = [];
    
    /**
     * StateNormalizer constructor.
     *
     * @param Normalizer[] $normalizers
     */
    public function __construct( array $normalizers )
    {
        foreach ( $normalizers as $normalizer ) {
            $this->addNormalizer( $normalizer );
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function normalize( State $state ): array
    {
        foreach ( $this->normalizers as $normalizer ) {
            if ( $normalizer->canNormalize( $state ) ) {
                return $normalizer->normalize( $state );
            }
        }
        
        throw new UnNormalizableStateException( $this, $state );
    }
    
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        foreach ( $this->normalizers as $normalizer ) {
            if ( $normalizer->canNormalize( $state ) ) {
                $normalizer->denormalize( $state, $data );
                return;
            }
        }
        
        throw new UnDenormalizableStateException( $this, $state );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        foreach ( $this->normalizers as $normalizer ) {
            if ( $normalizer->canNormalize( $state ) ) {
                return true;
            }
        }
        
        return false;
    }
    
    public function addNormalizer( Normalizer $normalizer ): MultiStateNormalizer
    {
        $this->normalizers[] = $normalizer;
        
        return $this;
    }
}