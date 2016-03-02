<?php

namespace App\Repositories;

//use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use App\Repositories\Criteria\AccountCriteria;
use App\Repositories\Criteria\UserCriteria;

/**
 * Base Repository.
 */
trait BaseRepositoryTrait
{
    //    public function boot()
//    {
//        if (in_array('user_id', $this->getFieldsSearchable())) {
//            $this->pushCriteria(new UserCriteria());
//        }
//
//        if (in_array('account_id', $this->getFieldsSearchable())) {
//            $this->pushCriteria(new AccountCriteria());
//        }
//    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $class = explode('\\', get_class($this));

        if (!empty($class[2]) && class_exists($model = 'App\Models\\'.str_replace('Repository', '', $class[2]))) {
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
        $attributes['account_id'] = \Session::get('account_id');
        $attributes['user_id'] = \Auth::user()->id;

        return parent::create($attributes);
    }
}
