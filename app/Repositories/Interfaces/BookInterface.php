<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface BookInterface {

    /**
     * @return Builder
     */
    public function queryWithRelations($relations): Builder;

    /**
     * @return Collection
     */
    public function getWithRelations($sortField, $sortOrder, $relations): Collection;

    /**
     * @return Collection
     */
    public function findWithRelations($id, $relations): Model;

    /**
     * @param $request
     * @return Model
     */
    public function storeBook($request): Model;

    /**
     * @param $request
     */
    public function updateBook($request): void;

    /**
     * @param $request
     */
    public function deleteBook($request);
}
