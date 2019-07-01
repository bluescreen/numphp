<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-06-27
 * Time: 13:54
 */

namespace SciPhp\NdArray;


use SciPhp\NdArray;

trait ConcatTrait
{
    function concat(NdArray $ar1)
    {
        $newData = $ar1->data;
        foreach ($this->data as $row) {
            $newData[] = $row;
        }
        return new NdArray($newData);
    }
}
