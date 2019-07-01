<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-07-01
 * Time: 18:27
 */

namespace SciPhp\NumPhp;


use SciPhp\RandomGenerator;

trait RandomTrait
{
    final public static function random(){
        return (new RandomGenerator());
    }
}
