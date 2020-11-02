<?php

class Finder
{
    private array $mdb;

    public function __construct(array $mdb)
    {
        $this->mdb = $mdb;
    }

    public function findPerson(string $number): string
    {
        $ans = 'Number not found';
        foreach ($this->mdb as $person) {
            if ($person['number'] == $number) {
                $ans = $person['name'] . " " . $person['surname'];
            }
        }
        return $ans;
    }

}