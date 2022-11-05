<?php

namespace App\Repositories;

use App\Models\User as Model;
use App\Repositories\Interfaces\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
