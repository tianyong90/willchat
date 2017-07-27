<?php

namespace App\Repositories;

use App\Repositories\Criteria\AccountCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Qrcode Repository.
 */
class QrcodeRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        //        $this->pushCriteria(new AccountCriteria());
    }

    /**
     * 二维码列表.
     *
     * @param string $type
     *
     * @return array
     */
    public function listByType($type = 'forever')
    {
        return $this->scopeQuery(function ($query) use ($type) {
            return $query->where('type', '=', $type)->orderBy('id', 'desc');
        })->paginate();
    }
}
