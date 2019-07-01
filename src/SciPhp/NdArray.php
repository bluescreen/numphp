<?php

namespace SciPhp;

use SciPhp\NdArray\Formatter;
use SciPhp\NdArray\Decorator;

/**
 * Base array
 *
 * @property NdArray $T
 * @property int $ndim
 * @property int $size
 * @property array $data
 * @property array $shape
 *
 */
final class NdArray extends Decorator
{
    /**
     * Constructor
     *
     * @param array $data
     */
    final public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Pretty printer
     *
     * @return string
     */
    final public function __toString()
    {
        return (new Formatter($this))->toString();
    }
}
