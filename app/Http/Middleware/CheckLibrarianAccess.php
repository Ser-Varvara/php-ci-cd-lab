<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLibrarianAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->header('X-Librarian-Id')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Доступ заборонено.',
            ], 403);
        }

        $response = $next($request);

        $response->headers->set('X-Security-Policy', 'Enforced');

        return $response;
    }
}
