<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-07-01
 * Time: 20:30
 */

namespace SciPhpTest\Unit;

use SciPhp\NumPhp as np;

use PHPUnit\Framework\TestCase;


class DivisionTest extends TestCase
{
    public function testDivideByVector()
    {
        $X = np::ar([[1, 2, 3],
                     [4, 5, 6],
                     [7, 8, 9]]);
        $Y = np::ar([[1], [2], [3]]);
        $this->assertEquals([[1, 2, 3], [2, 2.5, 3], [2.3333333333333, 2.6666666666667, 3]], $X->divide($Y)->data);
    }

}
