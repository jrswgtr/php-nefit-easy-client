<?php

namespace Wagter\NefitEasyClient\State;

abstract class AbstractState implements State
{
    /**
     * @var string
     */
    private $type;
    
    /**
     * @var bool
     */
    private $recordable;
    
    /**
     * @var bool
     */
    private $writeable;
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param string $type
     *
     * @return AbstractState
     */
    public function setType( string $type ): State
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isRecordable(): bool
    {
        return $this->recordable;
    }
    
    /**
     * @param bool $recordable
     *
     * @return AbstractState
     */
    public function setRecordable( bool $recordable ): State
    {
        $this->recordable = $recordable;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isWriteable(): bool
    {
        return $this->writeable;
    }
    
    /**
     * @param bool $writeable
     *
     * @return AbstractState
     */
    public function setWriteable( bool $writeable ): State
    {
        $this->writeable = $writeable;
    
        return $this;
    }
}