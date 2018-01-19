<?php

namespace App\Services;

use App\Model\Project;
use App\Model\User;

class ProjectService
{
    private $model;

    /**
     * ProjectService constructor.
     */
    public function __construct()
    {
        $this->model = new Project();
    }

    public function save(User $user, $attributes)
    {
        $this->model->fill($attributes);
        $this->model->user()->associate($user);
        $this->model->client()->associate($attributes['client_id']);
        $this->model->save();

        return $this->model;
    }
}