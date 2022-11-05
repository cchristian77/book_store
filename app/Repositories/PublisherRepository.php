<?php

namespace App\Repositories;

use App\Models\Publisher as Model;
use App\Repositories\Interfaces\PublisherInterface;

class PublisherRepository extends BaseRepository implements PublisherInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
