<?php

namespace App;

class Person{

    private string $personID;

    public function __construct($personID){
        $this->personID = $personID;
    }

    public function getPersonID(): string
    {
        return $this->personID;
    }


}