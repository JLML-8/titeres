<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(\Auth::id()!== 1){
            return redirect()->back()
            ->with(['mensaje' => 'Solo el administrador puede acceder a estas características.', 'tipo' => 'alert-success']);
        }

        return $next($request);
    }
}
