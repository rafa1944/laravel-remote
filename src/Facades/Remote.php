<?php

namespace Rafa1944\Remote\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rafa1944\Remote\Remote
 */
class Remote extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-remote';
    }
}
