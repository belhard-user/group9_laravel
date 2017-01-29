<?php

namespace App\Xxx;

class B implements iXxx
{
    public function __construct()
    {
        
    }

    public function foo()
    {
        echo __METHOD__;

        return $this;
    }

    public function foo2()
    {
        echo __METHOD__;

        return $this;
    }

    public function foo3()
    {
        echo __METHOD__;

        return $this;
    }
}