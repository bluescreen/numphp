<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-06-27
 * Time: 13:14
 */

namespace SciPhp;

use SciPhp\NumPhp as np;


class RandomGenerator
{
    public function randn($a = 1, $b = 1){
        $X = np::zeros($a, $b);
        $X->walk(function (&$data) {
            $data[0] = $this->nrand(0, 1);
            $data[1] = $this->nrand(0, 1);
        });
        return np::ar($X->data);
    }

    public function choice($a, $size = null, $replace = true, $p = null)
    {
        if($size){
            $random = [];
            for ($i = 0; $i < $size; $i++) {
                $random[] = rand(0, $a);
            }
            return np::ar($random);
        }
        return rand(0, $a);
    }

    public function randint($low, $high = null, $size = 10)
    {
        if(is_array($size)){
            list($cols, $rows) = $size;
            for ($j = 0; $j < $cols; $j++) {
                for ($k = 0; $k < $rows; $k++) {
                    $random[$j][$k] = rand($low, $high);
                }
            }
        } else{
            for ($i = 0; $i < $size; $i++) {
                $random[] = rand($low, $high);
            }
        }
        return np::ar($random);
    }

    public function random($a = null, $b = null)
    {
        if($a && !$b){
            return $this->randn($a, 1);
        }
        if($a && $b){
            return $this->randn($a, $b);
        }
        return $this->nrand(0,1);
    }

    private function urand(){
        return mt_rand() / mt_getrandmax();
    }

    private function nrand($mean, $sd)
    {
        $x = mt_rand() / mt_getrandmax();
        $y = mt_rand() / mt_getrandmax();
        return sqrt(-2 * log($x)) * cos(2 * pi() * $y) * $sd + $mean;
    }
}
