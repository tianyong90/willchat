<?php

namespace App\Http\Middleware;

trait ShouldPassThroughTrait
{
    /**
     * 根据排队规则 $except 确定是否直接通过中间件.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
