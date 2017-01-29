<?php

namespace App\Xxx;

class A implements iXxx
{
    private $b;
    private $t;

    public function __construct(B $b)
    {
        $this->b = $b;
    }

    public function foo()
    {
        // TODO: Implement foo() method.
    }
}