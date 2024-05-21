<?php

namespace OnClick\FilamentOnClick\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OnClick\FilamentOnClick\FilamentOnClick
 */
class FilamentOnClick extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OnClick\FilamentOnClick\FilamentOnClick::class;
    }
}
