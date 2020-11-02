<?php

class ImageManager
{

    private array $images;

    public function __construct(array $images)
    {
        $this->images = $images;
    }

    public function updateLikes(string $index)
    {

        for ($i = 0; $i < count($this->images); $i++) {
            if ($this->images[$i][0] == abs($index)) {

                if ($_POST['Like'] > 0) {
                    $this->images[$i][1] = (string)($this->images[$i][1] + 1);
                } else {
                    $this->images[$i][1] = (string)($this->images[$i][1] - 1);
                }
            }
        }

    }

    public function getImages():array
    {
        return $this->images;
    }

}