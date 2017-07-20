<?php

namespace CodeDelivery\Http\Middleware;

use function abort;
use Closure;
use \Illuminate\Support\Facades\Auth;
use function nullOrEmptyString;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
             if (!Auth::check()) {
                return redirect('auth/login');
            }

            if($request->user() ===null){
                 abort(401, 'Acesso não Autorizado');
            }

            $actions = $request->route()->getAction();
            $roles = isset($actions['permission']) ? $actions['permission'] : null;

            if($request->user()->hasManyRoles($roles) || !$roles){
                return $next($request);
            }

        abort(401, 'Acesso não Autorizado');
    }
}
