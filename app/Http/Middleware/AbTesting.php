<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AbTesting
{
    public function handle(Request $request, Closure $next): Response
    {
        $variant = $request->cookie('ab_variant');

        if (!in_array($variant, ['A', 'B'])) {
            $variant = random_int(0, 1) === 0 ? 'A' : 'B';
        }

        // Allow override via ?variant=A or ?variant=B for testing
        if (in_array($request->query('variant'), ['A', 'B'])) {
            $variant = $request->query('variant');
        }

        view()->share('abVariant', $variant);

        $response = $next($request);

        if ($response instanceof Response && !$request->cookie('ab_variant')) {
            $response->headers->setCookie(cookie('ab_variant', $variant, 60 * 24 * 30)); // 30 days
        }

        return $response;
    }
}
