<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class Account
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('account_id')) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect(user_url('/'));
            }
        }

        return $next($request);
    }
}
