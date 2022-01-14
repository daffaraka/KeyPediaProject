<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
   
    public function handle(Request $request, Closure $next)
    {
        $roles = auth()->user()->role;

        if ( !Auth::check())
        return redirect()->route('base');
        $user = Auth::user();

        foreach ($roles as $role) {

            if ($user->hasRole($roles))
            return $next($request);
            
            else {
            return redirect()->route('login');
            }
        } 
       
      
    }
}
