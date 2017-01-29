<?php

namespace App\Xxx;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Foundation\Application
 */
class MyFacede extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Xxx\iXxx';
    }
}
