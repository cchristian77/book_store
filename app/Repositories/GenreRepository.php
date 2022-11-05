<?php

namespace App\Repositories;

use App\Models\Genre as Model;
use App\Repositories\Interfaces\GenreInterface;

class GenreRepository extends BaseRepository implements GenreInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
