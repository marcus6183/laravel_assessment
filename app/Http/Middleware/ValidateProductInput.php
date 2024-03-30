<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateProductInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Input Validation
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'details' => ['required', 'string'],
            'publish' => ['required']
        ]);

        // Input Sanitization
        $inputs = $request->all();
        $inputs['name'] = strip_tags($inputs['name']);
        $inputs['price'] = strip_tags($inputs['price']);
        $inputs['details'] = strip_tags($inputs['details']);

        $request->merge(['inputs' => $inputs]);

        return $next($request);
    }
}
