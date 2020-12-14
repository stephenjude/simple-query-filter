<?php

namespace Stephenjude\SimpleQueryFilter;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\SimpleQueryFilter\SimpleQueryFilter
 */
class SimpleQueryFilterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'simple-query-filter';
    }
}
