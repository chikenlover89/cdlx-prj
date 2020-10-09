<?php

class agifyAPI
{

    static function call(string $name): array
    {
        return (array)json_decode(file_get_contents("https://api.agify.io/?name=$name"));
    }


}
