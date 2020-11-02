<?php

class LooseResult implements Result{

    public function getMessage(): string
    {
        return "LOOSER!";
    }
}