<?php

namespace App\Services;

use App\Repositories\FanReportRepository;
use App\Repositories\FanRepository;

/**
 * 粉丝与公众号交互的数据报表服务
 *
 * @author yhsong <13810377933@163.com>
 */
class FanReport
{
    /**
     * repository.
     *
     * @var App\Repositories\FanRepository
     */
    private $fanRepository;

    /**
     * repository.
     *
     * @var App\Repositories\FanReportRepository
     */
    private $fanReportRepository;

    /**
     * construct.
     *
     * @param App\Repositories\AccountRepository $repository repository
     */
    public function __construct()
    {
        $this->fanRepository = new FanRepository();
        $this->fanReportRepository = new FanReportRepository();
    }

    /**
     * 粉丝活跃度+1, 同时在fan_reports表中增加记录.
     *
     * @param int    $accountId AccountID
     * @param string $openId    OpenID
     * @param string $type      操作类型
     *
     * @return bool
     */
    public function setLiveness($accountId, $openId, $type)
    {
        /*
         * 1 粉丝活跃度+1
         */
        $this->fanRepository->updateLiveness(['account_id' => $accountId, 'openid' => $openId]);

        /*
         * 2 在fan_reports表中增加记录
         */
        $this->fanReportRepository->store(['account_id' => $accountId, 'openid' => $openId, 'type' => $type]);
    }
}
