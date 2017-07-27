<?php
/**
 * UserCriteria.php.
 *
 * Part of willchat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    tianyong90 <412039588@qq.com>
 * @copyright 2016 tianyong90 <412039588@qq.com>
 *
 * @link      https://github.com/tianyong90
 */

namespace App\Repositories\Criteria;

use Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class UserCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        if ($authedUser = Auth::user()) {
            $model = $model->where('user_id', '=', $authedUser->id);
        }

        return $model;
    }
}
