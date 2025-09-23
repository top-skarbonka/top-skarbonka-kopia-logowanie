<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            // ✅ Jeśli użytkownik wchodzi w panel firmy
            if ($request->is('company') || $request->is('company/*')) {
                return route('company.login');
            }

            // ✅ Domyślnie kierujemy do logowania admina
            return route('login');
        }

        return null;
    }
}
