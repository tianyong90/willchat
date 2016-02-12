<?php

namespace App\Repositories;

use App\Models\Qrcode;

/**
 * Qrcode Repository.
 */
class QrcodeRepository
{
    use BaseRepository;

    /**
     * Qrcode Model.
     *
     * @var $model
     */
    protected $model;


    /**
     * construct
     *
     * @param Qrcode             $qrcode             模型
     * @param EventRepository    $eventRepository    事件Repository
     * @param MaterialRepository $materialRepository 素材Repository
     */
    public function __construct(Qrcode $qrcode)
    {
        $this->model = $qrcode;
    }

    /**
     * 二维码列表.
     *
     * @param int    $accountId
     * @param string $type
     *
     * @return array
     */
    public function listByType($accountId, $type = 'forever')
    {
        return $this->model->where('account_id', $accountId)->where('type', $type)->orderBy('id', 'asc')->paginate(15);
    }

    /**
     * 保存二维码.
     *
     * @param array $input input
     */
    public function store($input)
    {
        $input = array_merge($input, ['account_id' => \Session::get('account_id')]);

        return $this->savePost(new $this->model(), $input);
    }

    /**
     * savePost.
     *
     * @param Qrcode $menu  菜单
     * @param array  $input input
     *
     * @return Qrcode
     */
    public function savePost($menu, $input)
    {
        $menu->fill($input);
        $menu->save();

        return $menu;
    }
}
