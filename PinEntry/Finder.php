<?php

class Finder
{
    private array $mdb;

    public function __construct(array $mdb)
    {
        $this->mdb = $mdb;
    }

    public function findPerson(string $pin): string
    {
        $ans = '';
        foreach ($this->mdb as $person) {
            if ($person['PIN'] == $pin) {
                $ans = $person['Name'];
            }
        }
        return $ans;
    }

}