<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\LoginController;

use Closure;

class AuthenticateMiddleware {
    public function handle($request, Closure $next) {
        $user = new LoginController();

        if( $user->isValid() == true ) {
            return $next($request);
        }

        return redirect('/admin/login');
    }
}