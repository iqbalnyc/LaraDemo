<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class MustBeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $users = User::all();
        $emails = $users->pluck('email');
        $isTrue=false;

        foreach($emails as $email) {        
            if(auth()->user()?->email === $email) {
                $isTrue = true;
                break;
            }
        }
        if(!$isTrue)
        {
            abort(403);
        }

        return $next($request);
    }
}
