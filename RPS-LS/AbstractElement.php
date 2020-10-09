<?php

class AbstractElement implements ElementInterface {

    public function beats(ElementInterface $element): Result
    {
        if($this instanceof $element){
            return new TieResult();
        }

        if(in_array(get_class($element),$this->beatable)){
            return new WinResult();
        }

        return new LooseResult();

    }

    public function returnImageName(): string
    {
        // TODO: Implement returnImageName() method.
    }
}