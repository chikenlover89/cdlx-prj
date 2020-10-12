<?php

class PinFileManager
{
    private string $data = '';
    private string $path = '';

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function readPin(): string
    {
        $this->data = file_get_contents($this->path);
        trim($this->data);

        return $this->data;
    }

    public function deleteFile(): void
    {
        file_put_contents($this->path, '');
    }

    public function writePin(string $num): void
    {
        file_put_contents($this->path, $this->data.$num);
    }
}