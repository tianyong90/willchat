<?php

namespace App\Repositories;

/**
 * Base Repository.
 */
trait BaseRepositoryTrait
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $class = explode('\\', get_class($this));

        if (!empty($class[2]) && class_exists($model = 'App\\'.str_replace('Repository', '', $class[2]))) {
            return $model;
        }
    }

    /**
     * 创建新记录.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $modelFillable = $this->model->getFillable();

        if (in_array('account_id', $modelFillable)) {
            $attributes['account_id'] = (array_key_exists('account_id', $attributes) && $attributes['account_id']) ? $attributes['account_id'] : \Session::get('account_id');
        }

        if (in_array('user_id', $modelFillable)) {
            $attributes['user_id'] = (array_key_exists('user_id', $attributes) && $attributes['user_id']) ? $attributes['user_id'] : \Auth::user()->id;
        }

        return parent::create($attributes);
    }
}
