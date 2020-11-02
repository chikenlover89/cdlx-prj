<?php

class Paper extends AbstractElement implements ElementInterface{

    protected array $beatable = [Rock::class,Spock::class];

    public function returnImageName(): string
    {
        return 'paper.jpg';
    }
}