<?php

namespace App\Repositories;

use App\Models\Author as Model;
use App\Repositories\Interfaces\AuthorInterface;

class AuthorRepository extends BaseRepository implements AuthorInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
