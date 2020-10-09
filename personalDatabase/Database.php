<?php

class Database
{

    private array $registry = [];
    private string $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function setPerson(Person $person): void
    {
        $personArray = [$person->getFname(), $person->getSname(), $person->getPcode(), $person->getAdress()];
        $file = fopen($this->path, 'a');
        fputcsv($file, $personArray);
        fclose($file);
    }

    public function searchForPerson(string $pcode): string
    {
        $searchResults = '';
        foreach ($this->registry as $item) {
            if ($pcode == $item[2]) {
                $searchResults .= $item[0] . " / " . $item[1] . " / " . $item[2] . " / " . $item[3] . "\n";
            }
        }

        return $searchResults;

    }

    public function getDatabase(): array
    {
        $file = fopen($this->path, 'rw+');
        while (!feof($file)) {
            $this->registry[] = (array)fgetcsv($file);
        }
        fclose($file);

        return $this->registry;
    }


}