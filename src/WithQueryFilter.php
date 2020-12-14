<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\LazyCollection;
use Symfony\Component\HttpFoundation\Response;

trait WithQueryFilter
{
    /**
     * @param array $search
     * @param mixed $query
     */
    public function scopeFilter($query, $search)
    {
        /**
         * Make lazy collection of search queries except the "page" key.
         * The "page" key is used for eloquent pagination request. This will
         * prevent us from throwing column not found exception for the "page" key.
         */
        $search = collect($search)->lazy()->except('page');

        /**
         * Return query if there is no search query.
         */
        if ($search->isEmpty()) {
            return $query;
        }

        /**
         * Abort if any of the column is not found on the database tables.
         */
        $this->abortIfColumnNotFound($search);

        /**
         * Prepare search query strings.
         */
        $search = $search->map(function ($value, $key) {
            return [$key, 'LIKE', '%' . $value . '%'];
        })->values()->all();

        /**
         * Apply query strings.
         */
        return $query->where($search);
    }

    
    private function abortIfColumnNotFound($search)
    {
        abort_unless(
            Schema::hasColumns($this->getTable(), $search->keys()->all()),
            Response::HTTP_BAD_REQUEST,
            'Column not found on ' . $this->getTable() . ' table'
        );
    }
}
