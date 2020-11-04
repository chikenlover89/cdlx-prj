<?php

class csvManager
{

    public string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function readCSVtoArray(): array
    {
        $data = [];
        $file = fopen($this->path, 'rw+');
        while (!feof($file)) {
            $data[] = (array)fgetcsv($file);
        }
        fclose($file);

        return $data;
    }

    public function writeArraytoCSV(array $array): void
    {
        $file = fopen($this->path, 'a');
        fputcsv($file, $array);
        fclose($file);

    }

}