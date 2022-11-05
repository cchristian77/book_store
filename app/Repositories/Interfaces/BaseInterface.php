<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): Model;

    /**
     * @param array $criteria
     *
     * @return Model
     */
    public function findByCriteria(array $criteria): ?Model;

    /**
     * @param array $criteria
     *
     * @return Collection
     */
    public function getByCriteria(array $criteria): Collection;

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): ?Model;

    /**
     * @param $id
     * @param array $attributes
     *
     * @return void
     */
    public function update(array $attributes, $id);

    /**
     * @param $id
     *
     * @return void
     */
    public function delete($id);
}
