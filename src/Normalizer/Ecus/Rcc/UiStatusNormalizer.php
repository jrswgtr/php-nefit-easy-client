<?php

namespace Wagter\NefitEasyClient\Normalizer\Ecus\Rcc;


use Wagter\NefitEasyClient\Exception\InvalidDataArrayException;
use Wagter\NefitEasyClient\Exception\UnDenormalizableStateException;
use Wagter\NefitEasyClient\Exception\UnNormalizableStateException;
use Wagter\NefitEasyClient\Normalizer\AbstractStateNormalizer;
use Wagter\NefitEasyClient\State\Ecus\Rcc\UiStatus;
use Wagter\NefitEasyClient\State\State;

class UiStatusNormalizer extends AbstractStateNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize( State $state ): array
    {
        if ( !$state instanceof UiStatus ) {
            throw new UnNormalizableStateException( $this, $state );
        }
        
        $data = parent::normalize( $state );
        
        $data['value'] = [
            'UMD'     => $state->getUserMode(),
            'CPM'     => $state->getClockProgram(),
            'IHS'     => $state->getInHouseStatus(),
            'IHT'     => $state->getInHouseTemp(),
            'DHW'     => $state->isHotWaterActive(),
            'CTR'     => $state->getControl(),
            'TOD'     => $state->getTempOverrideDuration(),
            'CSP'     => $state->getCurrentSwitchpoint(),
            'ESI'     => $state->isPsActive(),
            'FPA'     => $state->isFpActive(),
            'TOR'     => $state->isTempOverride(),
            'HMD'     => $state->isHolidayMode(),
            'BBE'     => $state->isBoilerBlock(),
            'BLE'     => $state->isBoilerLock(),
            'BMR'     => $state->isBoilerMaintenance(),
            'TSP'     => $state->getTempSetpoint(),
            'TOT'     => $state->getTempOverrideTempSetpoint(),
            'MMT'     => $state->getTempManualSetpoint(),
            'HED_EN'  => $state->isHedEnabled(),
            'HED_DEV' => $state->isHedDeviceAtHome(),
        ];
        
        return $data;
    }
    
    /**
     * {@inheritdoc}
     */
    public function denormalize( State $state, array $data )
    {
        if ( !$state instanceof UiStatus ) {
            throw new UnDenormalizableStateException( $this, $state );
        }
        
        $this
            ->setData( $data, 'value.UMD', function ( $value ) use ( $state ) {
                $state->setUserMode( (string)$value );
            } )
            ->setData( $data, 'value.CPM', function ( $value ) use ( $state ) {
                $state->setClockProgram( (string)$value );
            } )
            ->setData( $data, 'value.IHS', function ( $value ) use ( $state ) {
                $state->setInHouseStatus( (string)$value );
            } )
            ->setData( $data, 'value.IHT', function ( $value ) use ( $state ) {
                $state->setInHouseTemp( (float)$value );
            } )
            ->setData( $data, 'value.DHW', function ( $value ) use ( $state ) {
                $state->setHotWaterActive( (bool)$value );
            } )
            ->setData( $data, 'value.CTR', function ( $value ) use ( $state ) {
                $state->setControl( (string)$value );
            } )
            ->setData( $data, 'value.TOD', function ( $value ) use ( $state ) {
                $state->setTempOverrideDuration( (int)$value );
            } )
            ->setData( $data, 'value.CSP', function ( $value ) use ( $state ) {
                $state->setCurrentSwitchpoint( (int)$value );
            } )
            ->setData( $data, 'value.ESI', function ( $value ) use ( $state ) {
                $state->setPsActive( (bool)$value );
                $state->setPowersaveMode( (bool)$value );
            } )
            ->setData( $data, 'value.FPA', function ( $value ) use ( $state ) {
                $state->setFpActive( (bool)$value );
                $state->setFireplaceMode( (bool)$value );
            } )
            ->setData( $data, 'value.TOR', function ( $value ) use ( $state ) {
                $state->setTempOverride( (bool)$value );
            } )
            ->setData( $data, 'value.HMD', function ( $value ) use ( $state ) {
                $state->setHolidayMode( (bool)$value );
            } )
            ->setData( $data, 'value.BBE', function ( $value ) use ( $state ) {
                $state->setBoilerBlock( (bool)$value );
            } )
            ->setData( $data, 'value.BLE', function ( $value ) use ( $state ) {
                $state->setBoilerLock( (bool)$value );
            } )
            ->setData( $data, 'value.BMR', function ( $value ) use ( $state ) {
                $state->setBoilerMaintenance( (bool)$value );
            } )
            ->setData( $data, 'value.TSP', function ( $value ) use ( $state ) {
                $state->setTempSetpoint( (float)$value );
            } )
            ->setData( $data, 'value.TOT', function ( $value ) use ( $state ) {
                $state->setTempOverrideTempSetpoint( (float)$value );
            } )
            ->setData( $data, 'value.MMT', function ( $value ) use ( $state ) {
                $state->setTempManualSetpoint( (float)$value );
            } )
            ->setData( $data, 'value.HED_EN', function ( $value ) use ( $state ) {
                $state->setHedEnabled( (bool)$value );
            } )
            ->setData( $data, 'value.HED_DEV', function ( $value ) use ( $state ) {
                $state->setHedDeviceAtHome( (bool)$value );
            } )
        ;
        
        parent::denormalize( $state, $data );
    }
    
    /**
     * {@inheritdoc}
     */
    public function canNormalize( State $state ): bool
    {
        return $state instanceof UiStatus;
    }
    
//    /**
//     * {@inheritdoc}
//     */
//    protected function setData( array $data, string $key, callable $closure ): AbstractStateNormalizer
//    {
//        if ( !isset( $data['value'] ) || !isset( $data['value'][ $key ] ) ) {
//            throw new InvalidDataArrayException( $key );
//        }
//
//        $closure( $data['value'][ $key ] );
//
//        return $this;
//    }
}