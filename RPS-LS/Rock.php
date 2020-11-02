<?php

class Rock extends AbstractElement implements ElementInterface{

    protected array $beatable = [Scissors::class,Lizard::class];

    public function returnImageName(): string
    {
        return 'rock.png';
    }
}