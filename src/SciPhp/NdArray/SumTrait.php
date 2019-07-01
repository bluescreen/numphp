<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-07-01
 * Time: 19:45
 */

namespace SciPhp\NdArray;

use SciPhp\NdArray;
use SciPhp\NumPhp as np;

trait SumTrait
{
    /**
     * @param $axis
     * @param bool $keepDim
     * @return NdArray
     */
    public function sumAxis($axis = null, $keepDim = false){

        /*
         * [[14, 17, 12, 33, 44],
                          [15, 6, 27, 8, 19],
                          [23, 2, 54, 1, 4,]]
         *
         * Sum of arr :  279
          Sum of arr(axis = 0) :  [52 25 93 42 67]
          Sum of arr(axis = 1) :  [120  75  84]

          Sum of arr (keepdimension is True):
           [[120]
           [ 75]
           [ 84]]
         */

        if($axis === null){
            return $this->sum();
        }

        if($axis == 1) {
            $sum = array_map(function ($items) {
                return array_sum($items);
            }, $this->data);
        } else{
            $sum = array_map(function ($items) {
                return array_sum($items);
            }, np::transpose($this)->data);


        }
        $M = np::ar($sum);
        if($keepDim){
            $M = ($axis == 1) ? $M->reshape($M->count(),1) : np::ar([$M->data]);
        }
        return $M;
    }
}
