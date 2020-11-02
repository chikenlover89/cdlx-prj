<?php

class WinResult implements Result{

    public function getMessage(): string
    {
        return "WINNER!";
    }
}