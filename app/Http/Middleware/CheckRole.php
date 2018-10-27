<?php

namespace App\Http\Middleware;

use Closure;

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
      if ($request->admin()== null) {
        return redirect()->route('error.forbidden');
      }
      $actions = $request->route()->getAction();
      $roles = isset($actions['roles']) ? $actions['roles'] : null;

      if ($request->admin()->hasAnyRole($roles) || !$roles) {
        return $next($request);
      }

      return redirect()->route('error.forbidden');
    }
}
