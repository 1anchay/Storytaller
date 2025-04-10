<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserTrulyVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()->trulyHasVerifiedEmail()) {
            return redirect()->route('profile.edit')
                ->with('warning', 'Для выполнения этого действия необходимо подтвердить email');
        }

        return $next($request);
    }
}