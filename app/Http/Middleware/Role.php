<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {   
        $userId = auth()->user()->user_id;
        $role = auth()->user()->role;
        if (auth()->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }elseif(auth()->user()->hasRoles($userId,$role)) {
            return redirect()->route('transaksi');
        }
        else{

            if (auth()->user()->hasRoles($userId,$role)) {
                return $next($request);
            }
      
    
        }


        // $role = Auth::user()->role;

        // if (Auth::user()->hasRole($role)) {
        //     // Redirect...
        // }

        // return $next($request);

            // if (!Auth::check()){
            //     return redirect()->route('login');
            // }
            
            // elseif(Auth::check()) {
            //         

            //         if (User::hasRole() == 'admin'){
            //             return $next($request);
            //         }
            // }
            // else{
            //     return back();
            // }
           
           
        // if(Auth::check()) {
        //     return redirect()->route('login');
        // }
        
      
        // $user = Auth::user();
        
        // if (Auth::check()) {
        //     return redirect()->route('base');  
        // }
        // else {
        //     $user->hasRole($roles == 'admin');
        //     return $next($request);
        

        
    }
}
