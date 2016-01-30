<?php

namespace App\Repositories;

use App\Models\FanReport;

/**
 * Fans Repository.
 */
class FanReportRepository
{
    use BaseRepository;

    /**
     * FanReport.
     *
     * @var FanReports
     */
    protected $model;

    public function __construct()
    {
        $this->model = new FanReport();
    }

    /**
     * store.
     *
     * @param array $input
     */
    public function store($input)
    {

        /*
         * 准备插入的数据
         */
        $_saveInfo['account_id'] = $input['account_id'];
        $_saveInfo['openid'] = $input['openid'];
        $_saveInfo['type'] = $input['type'];

        /*
         * 保存
         */
        $this->_savePost($this->model, $_saveInfo);

        /*
         * 返回生成的ID
         */
        return $this->model->id;
    }

    /**
     * save.
     *
     * @param object $fanReport
     * @param array  $input     Request
     */
    private function _savePost($fanReport, $input)
    {
        return $fanReport->fill($input)->save();
    }
}
