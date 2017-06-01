<?php

namespace App\Http\Middleware;

use Closure;
use Route;

class AclRest
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
        $actionData = $request->route()->getAction();
        list($resource, $action) = explode('.', $actionData["as"]);        
        return $next($request);
    }
}
