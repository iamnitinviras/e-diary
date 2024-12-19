<?php

namespace App\Http\Middleware;

use App\Models\Analytics;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Analytics::firstOrCreate([
            'action_date'=>date('Y-m-d'),
            'url' => $request->fullUrl(),
            'user_ip' => $request->ip(),
        ],[
            'url' => $request->fullUrl(),
            'user_ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'action' => 'view',
        ]);
        return $next($request);
    }
}
