<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermittedAccess
{
    public function handle(Request $request, Closure $next, ...$access)
    {
        // Check if the user has the required access
        $user = $request->user();
        if (!$user || !in_array($user->permitted_access, $access)) {
            return abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
