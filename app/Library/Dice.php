<?php

namespace App\Library;
/**
 * Created by PhpStorm.
 * User: Asterodeia
 * Date: 13/11/2016
 * Time: 21:55
 */
class Dice
{
    private $size = 100;

    public function roll(){
        return random_int(1, $this->size);
    }

}