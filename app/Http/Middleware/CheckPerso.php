<?php

namespace App\Http\Middleware;

use Closure;

class CheckPerso
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
        if(!$request->session()->has('perso') || $request->session()->get('perso')->user != $request->user()){
            return redirect('/home')->with('message', 'Merci de choisir un personnage.');
        }
        return $next($request);
    }
}
