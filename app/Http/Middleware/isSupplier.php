<?php

namespace App\Http\Middleware;

use Closure;

class isSupplier
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
        if(auth()->user() != null && auth()->user()->isSupplier){
            return $next($request);
        }

        else{
            return redirect('/supplier/login');
        }
    }
}
