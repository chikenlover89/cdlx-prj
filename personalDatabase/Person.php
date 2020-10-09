<?php

class Person
{

    private string $fname;
    private string $sname;
    private string $pcode;
    private string $adress;

    public function __construct(string $fname, string $sname, string $pcode, string $adress)
    {
        $this->fname = $fname;
        $this->sname = $sname;
        $this->pcode = $pcode;
        $this->adress = $adress;
    }


    public function getFname(): string
    {
        return $this->fname;
    }

    public function getSname(): string
    {
        return $this->sname;
    }

    public function getPcode(): string
    {
        return $this->pcode;
    }

    public function getAdress(): string
    {
        return $this->adress;
    }


}