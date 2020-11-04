<?php

class Calculator
{
    public static function investment(float $money, int $years,float $percent): float
    {
        $sum = $money;
        for($i = 0;$i<$years;$i++)
        {
            $sum += $sum*($percent/100);
        }
        return number_format((float)$sum, 2, '.', '');

    }

}


