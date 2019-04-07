<?php

namespace Wagter\NefitEasyClient\Normalizer;


use Wagter\NefitEasyClient\Exception\InvalidDataArrayException;
use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\State\State;

abstract class AbstractStateNormalizer implements Normalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize( State $state ): array
    {
        if ( !$this->canNormalize( $state ) ) {
            throw new UnNormalizableStateException( $this, $state );
        }
        
        $data = [];
        
        if ( method_exists( $state, 'getValue' ) ) {
            $data['value'] = $state->getValue();
        }
        
        return $data;
    }
    
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$this->canNormalize( $state ) ) {
            throw new UnDenormalizableStateException( $this, $state );
        }

        $this
            ->setData( $data, 'type', function ( $value ) use ( $state ) {
                $state->setType( (string)$value );
            } )
            ->setData( $data, 'recordable', function ( $value ) use ( $state ) {
                $state->setRecordable( (bool)$value );
            } )
            ->setData( $data, 'writeable', function ( $value ) use ( $state ) {
                $state->setWriteable( (bool)$value );
            } )
        ;
    }
    
    
    /**
     *
     * @param array $data
     * @param string $key
     * @param callable $closure
     *
     * @return AbstractStateNormalizer
     * @throws InvalidDataArrayException
     */
    protected function setData( array $data, string $key, callable $closure ): AbstractStateNormalizer
    {
        $value = $this->getValue( $data, $key );
        if ( $value === null ) {
            throw new InvalidDataArrayException( $key );
        }
        $closure( $value );
        
        return $this;
    }
    
    private function getValue( array $data, string $key )
    {
        $keys = explode( '.', $key );
        
        if ( count( $keys ) === 1 && isset( $data[ $keys[0] ] ) ) {
            return $data[ $keys[0] ];
        }
        
        if ( count( $keys ) === 2 && isset( $data[ $keys[0] ] ) && isset( $data[ $keys[0] ][ $keys[1] ] ) ) {
            return $data[ $keys[0] ][ $keys[1] ];
        }
        
        return null;
    }
}