<?php

namespace App\Repositories;

use App\Models\Cookie;

class CookieRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = new Cookie();
    }

    public function save($attributes)
    {
        $find = $this->model->firstWhere("user_id", $attributes['user_id']);
        if (empty($find)) {
            $save = $this->model->create($attributes);
        } else {
            $save = $find->update($attributes);
        }

        return $save;
    }
}