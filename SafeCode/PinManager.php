<?php

class PinManager{
    private string $tempPin;
    private string $pin;

    public function setPin(string $pin):void
    {
        $this->pin = $pin;
    }
    public function getPin():string
    {
        return $this->pin;
    }

    public function setTempPin(string $tempPin):void
    {
        $this->tempPin = $tempPin;
    }

    public function getTempPin():string
    {
        return $this->tempPin;
    }

    public function checkPin():string
    {
        $msg = '_ _ _ _';
        if((strlen($this->tempPin) == 4) && ($this->tempPin == $this->pin)){
        $msg = 'PIN OK!';
        }
        if((strlen($this->tempPin) == 4) && ($this->tempPin != $this->pin)){
            $msg = 'WRONG PIN!';
        }
        return $msg;
    }


}