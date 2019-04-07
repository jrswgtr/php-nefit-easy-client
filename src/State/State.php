<?php

namespace Wagter\NefitEasyClient\State;

interface State
{
    public function getId(): string;
    
    public function setType( string $type ): State;
    
    public function getType(): string;
    
    public function setWriteable( bool $writable ): State;
    
    public function isWriteable(): bool;
    
    public function setRecordable( bool $recordable ): State;
    
    public function isRecordable(): bool;
}