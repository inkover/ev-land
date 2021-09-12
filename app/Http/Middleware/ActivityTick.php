<?php

namespace App\Http\Middleware;

use App\Services\Activity\TickService;
use Closure;
use Illuminate\Http\Request;

class ActivityTick
{

    private TickService $tickService;

    /**
     * @param TickService $tickService
     */
    public function __construct(TickService $tickService)
    {
        $this->tickService = $tickService;
    }


    public function handle(Request $request, Closure $next)
    {
        $this->tickService->dispatchTick($request->fullUrl(), now());
        return $next($request);
    }
}
