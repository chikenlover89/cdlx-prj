<?php

class Lizard extends AbstractElement implements ElementInterface{

    protected array $beatable = [Paper::class,Spock::class];


    public function returnImageName(): string
    {
        return 'lizard.jpeg';
    }
}