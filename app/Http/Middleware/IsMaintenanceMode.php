<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/*')) {
            // If the request is from an API route, return 'api'
            $response = [
                'success' => false,
                'message' => 'Web is in maintenanace mode!!',
            ];
    
            $code = '404';
            
            
            return response()->json($response, $code);
        } else {
            return response()->view('main');

        }
    }
}
