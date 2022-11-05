<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param $perPage
     * @param $sortField
     * @param $sortOrder
     * @return LengthAwarePaginator
     */
    public function getAllPaginated($perPage, $sortField, $sortOrder): LengthAwarePaginator
    {
        $fillable = 'id';
        $sortOrder = $sortOrder ?? 'asc';

        if ($sortField) {
            foreach ($this->model->getFillable() as $fill) {
                if ($sortField === $fill) {
                    $fillable = $sortField;
                    break;
                }
            }
        }

        return $this->model
            ->orderBy($fillable, $sortOrder)
            ->paginate($perPage);
    }

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $criteria
     *
     * @return Model
     */
    public function findByCriteria(array $criteria): ?Model
    {
        return $this->model
            ->where($criteria)
            ->first();
    }

    /**
     * @param array $criteria
     *
     * @return Collection
     */
    public function getByCriteria(array $criteria): Collection
    {
        return $this->model
            ->where($criteria)
            ->get();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     *
     * @return void
     */
    public function update(array $attributes, $id)
    {
        return $this->model
            ->where('id', $id)
            ->update($attributes);
    }

    /**
     * @param $id
     *
     * @return void
     */
    public function delete($id)
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }

}
