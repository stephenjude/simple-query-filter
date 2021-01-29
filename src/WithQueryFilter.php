<?php

namespace Stephenjude\SimpleQueryFilter;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\LazyCollection;
use Symfony\Component\HttpFoundation\Response;

trait WithQueryFilter
{
    /**
     * @param array $filter
     * @param mixed $query
     */
    public function scopeFilter($query, $filter)
    {
        /**
         * Make lazy collection of filter queries except the "page" key.
         * The "page" key is used for eloquent pagination request. This will
         * prevent us from throwing column not found exception for the "page" key.
         */
        $filter = collect($filter)->lazy()->except('page');

        /**
         * Abort if any of the column is not found on the database tables.
         */
        $this->abortIfColumnNotFound($filter);

        /**
         * Prepare filter query strings.
         */
        $filter->map(function ($value, $key) use ($query) {
            return $query->where($key, 'LIKE', '%'.$value.'%');
        })->values()->all();
    }

    /**
     * @param array $filter
     * @param mixed $query
     */
    public function scopeScout($query, $search)
    {
        /**
         * Make lazy collection of search queries except the "page" key.
         * The "page" key is used for eloquent pagination request. This will
         * prevent us from throwing column not found exception for the "page" key.
         */
        $search = collect($search)->lazy()->except('page');

        /**
         * Abort if any of the column is not found on the database tables.
         */
        $this->abortIfColumnNotFound($search);

        /**
         * Prepare search query strings.
         */
        $search->map(function ($value, $key) use ($query) {
            $query->orWhere($key, 'LIKE', '%'.$value.'%');
        });
    }

    /**
     * @param Collection|LazyCollection $search
     */
    private function abortIfColumnNotFound($search)
    {
        abort_unless(
            Schema::hasColumns($this->getTable(), $search->keys()->all()),
            Response::HTTP_BAD_REQUEST,
            'Column not found on '.$this->getTable().' table'
        );
    }
}
