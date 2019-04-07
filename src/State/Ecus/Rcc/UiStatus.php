<?php

namespace Wagter\NefitEasyClient\State\Ecus\Rcc;

use Wagter\NefitEasyClient\State\AbstractState;

class UiStatus extends AbstractState
{
    /**
     * @var string
     */
    private $userMode;
    
    /**
     * @var string
     */
    private $clockProgram;
    
    /**
     * @var string
     */
    private $inHouseStatus;
    
    /**
     * @var float
     */
    private $inHouseTemp;
    
    /**
     * @var bool
     */
    private $hotWaterActive;
    
    /**
     * @var string
     */
    private $boilerIndicator;
    
    /**
     * @var string
     */
    private $control;
    
    /**
     * @var int
     */
    private $tempOverrideDuration;
    
    /**
     * @var int
     */
    private $currentSwitchpoint;
    
    /**
     * @var bool
     */
    private $psActive;
    
    /**
     * @var bool
     */
    private $powersaveMode;
    
    /**
     * @var bool
     */
    private $fpActive;
    
    /**
     * @var bool
     */
    private $fireplaceMode;
    
    /**
     * @var bool
     */
    private $tempOverride;
    
    /**
     * @var bool
     */
    private $holidayMode;
    
    /**
     * @var bool|null
     */
    private $boilerBlock = null;
    
    /**
     * @var bool|null
     */
    private $boilerLock = null;
    
    /**
     * @var bool|null
     */
    private $boilerMaintenance = null;
    
    /**
     * @var float
     */
    private $tempSetpoint;
    
    /**
     * @var float
     */
    private $tempOverrideTempSetpoint;
    
    /**
     * @var float
     */
    private $tempManualSetpoint;
    
    /**
     * @var bool|null
     */
    private $hedEnabled = null;
    
    /**
     * @var bool|null
     */
    private $hedDeviceAtHome = null;
    
    public function getId(): string
    {
        return '/bridge/ecus/rrc/uiStatus';
    }
    
    /**
     * @return string
     */
    public function getUserMode(): string
    {
        return $this->userMode;
    }
    
    /**
     * @param string $userMode
     *
     * @return UiStatus
     */
    public function setUserMode( string $userMode ): UiStatus
    {
        $this->userMode = $userMode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getClockProgram(): string
    {
        return $this->clockProgram;
    }
    
    /**
     * @param string $clockProgram
     *
     * @return UiStatus
     */
    public function setClockProgram( string $clockProgram ): UiStatus
    {
        $this->clockProgram = $clockProgram;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getInHouseStatus(): string
    {
        return $this->inHouseStatus;
    }
    
    /**
     * @param string $inHouseStatus
     *
     * @return UiStatus
     */
    public function setInHouseStatus( string $inHouseStatus ): UiStatus
    {
        $this->inHouseStatus = $inHouseStatus;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getInHouseTemp(): float
    {
        return $this->inHouseTemp;
    }
    
    /**
     * @param float $inHouseTemp
     *
     * @return UiStatus
     */
    public function setInHouseTemp( float $inHouseTemp ): UiStatus
    {
        $this->inHouseTemp = $inHouseTemp;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isHotWaterActive(): bool
    {
        return $this->hotWaterActive;
    }
    
    /**
     * @param bool $hotWaterActive
     *
     * @return UiStatus
     */
    public function setHotWaterActive( bool $hotWaterActive ): UiStatus
    {
        $this->hotWaterActive = $hotWaterActive;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBoilerIndicator(): string
    {
        return $this->boilerIndicator;
    }
    
    /**
     * @param string $boilerIndicator
     *
     * @return UiStatus
     */
    public function setBoilerIndicator( string $boilerIndicator ): UiStatus
    {
        $this->boilerIndicator = $boilerIndicator;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getControl(): string
    {
        return $this->control;
    }
    
    /**
     * @param string $control
     *
     * @return UiStatus
     */
    public function setControl( string $control ): UiStatus
    {
        $this->control = $control;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTempOverrideDuration(): int
    {
        return $this->tempOverrideDuration;
    }
    
    /**
     * @param int $tempOverrideDuration
     *
     * @return UiStatus
     */
    public function setTempOverrideDuration( int $tempOverrideDuration ): UiStatus
    {
        $this->tempOverrideDuration = $tempOverrideDuration;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCurrentSwitchpoint(): int
    {
        return $this->currentSwitchpoint;
    }
    
    /**
     * @param int $currentSwitchpoint
     *
     * @return UiStatus
     */
    public function setCurrentSwitchpoint( int $currentSwitchpoint ): UiStatus
    {
        $this->currentSwitchpoint = $currentSwitchpoint;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isPsActive(): bool
    {
        return $this->psActive;
    }
    
    /**
     * @param bool $psActive
     *
     * @return UiStatus
     */
    public function setPsActive( bool $psActive ): UiStatus
    {
        $this->psActive = $psActive;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isPowersaveMode(): bool
    {
        return $this->powersaveMode;
    }
    
    /**
     * @param bool $powersaveMode
     *
     * @return UiStatus
     */
    public function setPowersaveMode( bool $powersaveMode ): UiStatus
    {
        $this->powersaveMode = $powersaveMode;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isFpActive(): bool
    {
        return $this->fpActive;
    }
    
    /**
     * @param bool $fpActive
     *
     * @return UiStatus
     */
    public function setFpActive( bool $fpActive ): UiStatus
    {
        $this->fpActive = $fpActive;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isFireplaceMode(): bool
    {
        return $this->fireplaceMode;
    }
    
    /**
     * @param bool $fireplaceMode
     *
     * @return UiStatus
     */
    public function setFireplaceMode( bool $fireplaceMode ): UiStatus
    {
        $this->fireplaceMode = $fireplaceMode;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isTempOverride(): bool
    {
        return $this->tempOverride;
    }
    
    /**
     * @param bool $tempOverride
     *
     * @return UiStatus
     */
    public function setTempOverride( bool $tempOverride ): UiStatus
    {
        $this->tempOverride = $tempOverride;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isHolidayMode(): bool
    {
        return $this->holidayMode;
    }
    
    /**
     * @param bool $holidayMode
     *
     * @return UiStatus
     */
    public function setHolidayMode( bool $holidayMode ): UiStatus
    {
        $this->holidayMode = $holidayMode;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function isBoilerBlock(): ?bool
    {
        return $this->boilerBlock;
    }
    
    /**
     * @param bool $boilerBlock
     *
     * @return UiStatus
     */
    public function setBoilerBlock( bool $boilerBlock ): UiStatus
    {
        $this->boilerBlock = $boilerBlock;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function isBoilerLock(): ?bool
    {
        return $this->boilerLock;
    }
    
    /**
     * @param bool $boilerLock
     *
     * @return UiStatus
     */
    public function setBoilerLock( bool $boilerLock ): UiStatus
    {
        $this->boilerLock = $boilerLock;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function isBoilerMaintenance(): ?bool
    {
        return $this->boilerMaintenance;
    }
    
    /**
     * @param bool $boilerMaintenance
     *
     * @return UiStatus
     */
    public function setBoilerMaintenance( bool $boilerMaintenance ): UiStatus
    {
        $this->boilerMaintenance = $boilerMaintenance;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getTempSetpoint(): float
    {
        return $this->tempSetpoint;
    }
    
    /**
     * @param float $tempSetpoint
     *
     * @return UiStatus
     */
    public function setTempSetpoint( float $tempSetpoint ): UiStatus
    {
        $this->tempSetpoint = $tempSetpoint;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getTempOverrideTempSetpoint(): float
    {
        return $this->tempOverrideTempSetpoint;
    }
    
    /**
     * @param float $tempOverrideTempSetpoint
     *
     * @return UiStatus
     */
    public function setTempOverrideTempSetpoint( float $tempOverrideTempSetpoint ): UiStatus
    {
        $this->tempOverrideTempSetpoint = $tempOverrideTempSetpoint;
        
        return $this;
    }
    
    /**
     * @return float
     */
    public function getTempManualSetpoint(): float
    {
        return $this->tempManualSetpoint;
    }
    
    /**
     * @param float $tempManualSetpoint
     *
     * @return UiStatus
     */
    public function setTempManualSetpoint( float $tempManualSetpoint ): UiStatus
    {
        $this->tempManualSetpoint = $tempManualSetpoint;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function isHedEnabled(): ?bool
    {
        return $this->hedEnabled;
    }
    
    /**
     * @param bool $hedEnabled
     *
     * @return UiStatus
     */
    public function setHedEnabled( bool $hedEnabled ): UiStatus
    {
        $this->hedEnabled = $hedEnabled;
        
        return $this;
    }
    
    /**
     * @return bool|null
     */
    public function isHedDeviceAtHome(): bool
    {
        return $this->hedDeviceAtHome;
    }
    
    /**
     * @param bool|null $hedDeviceAtHome
     *
     * @return UiStatus
     */
    public function setHedDeviceAtHome( bool $hedDeviceAtHome ): UiStatus
    {
        $this->hedDeviceAtHome = $hedDeviceAtHome;
        
        return $this;
    }
}