<?php
/**
 * Created by PhpStorm.
 * User: markusmuschol
 * Date: 2019-07-01
 * Time: 21:19
 */

namespace SciPhpTest\Unit;

use SciPhp\NumPhp as np;
use PHPUnit\Framework\TestCase;

function dd(){
    print_r(func_get_args()); die;
}


class RandomTest extends TestCase
{
    public function testRandN(){
        $result = np::random()->randn();
        $this->assertNotNull($result[0]);
    }

    public function testRandomWithVector(){
        $result = np::random()->random(5);
        $this->assertNotNull($result[0]);
    }

    public function testRandomWithTuple(){
        $result = np::random()->random(3,2);
        $this->assertNotNull($result[0]);
    }

    /*
    public function testRandNDim(){
        $result = np::random()->randn(5,2);
        $this->assertCount(5, $result["1"]);
    }*/


    public function testRandomChoice()
    {
        // np.random.choice(5, 3)
        // array([0, 3, 4])
        $result = np::random()->choice(5,3);
        $this->assertCount(3, $result->data);
    }

    public function testRandomRandInt()
    {
        $result = np::random()->randint(1,null, 10);
        $this->assertCount(10, $result->data);
    }

    public function testRandomRandIntReshape()
    {
        $result = np::random()->randint(1,5, [2,4]);
        $this->assertCount(2, $result->data);
        $this->assertCount(4, $result->data[0]);
    }
}
