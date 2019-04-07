<?php
/**
 * Created by PhpStorm.
 * User: joris
 * Date: 30/03/19
 * Time: 16:25
 */

namespace Wagter\NefitEasyClient\State;


abstract class MinMaxValueTemperatureState extends FloatValueState
{
    
    /**
     * @var string
     */
    private $unitOfMeasure;
    
    /**
     * @var int
     */
    private $minValue;
    
    /**
     * @var int
     */
    private $maxValue;
    
    /**
     * @return string
     */
    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }
    
    /**
     * @param string $unitOfMeasure
     *
     * @return MinMaxValueTemperatureState
     */
    public function setUnitOfMeasure( string $unitOfMeasure ): MinMaxValueTemperatureState
    {
        $this->unitOfMeasure = $unitOfMeasure;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMinValue(): int
    {
        return $this->minValue;
    }
    
    /**
     * @param int $minValue
     *
     * @return MinMaxValueTemperatureState
     */
    public function setMinValue( int $minValue ): MinMaxValueTemperatureState
    {
        $this->minValue = $minValue;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMaxValue(): int
    {
        return $this->maxValue;
    }
    
    /**
     * @param int $maxValue
     *
     * @return MinMaxValueTemperatureState
     */
    public function setMaxValue( int $maxValue ): MinMaxValueTemperatureState
    {
        $this->maxValue = $maxValue;
        
        return $this;
    }
}