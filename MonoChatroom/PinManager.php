<?php

class PinManager{

    private PDO $database;
    private array $pdb;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function readDatabase():void
    {
        $sql = $this->database->query("SELECT * FROM tbl_pin");
        $this->pdb = $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function findPerson(string $pin): string
    {
        $ans = 'anon';
        foreach ($this->pdb as $person) {
            if ($person['PIN'] == $pin) {
                $ans = $person['Name'];
            }
        }
        return $ans;
    }


}