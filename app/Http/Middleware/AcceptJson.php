<?php

namespace App\Http\Middleware;

use App\Enum\ContentType;
use Closure;
use Illuminate\Http\Request;

class AcceptJson
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', ContentType::JSON->value);

        return $next($request);
    }
}
