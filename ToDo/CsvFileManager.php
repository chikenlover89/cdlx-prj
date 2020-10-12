<?php

class CsvFileManager
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

        array_pop($data);

        return $data;
    }

    public function deleteFile(): void
    {
        file_put_contents($this->path, '');
    }

    public function writeArraytoCSV(array $array): void
    {
        $file = fopen($this->path, 'a');
        fputcsv($file, $array);
        fclose($file);

    }

}