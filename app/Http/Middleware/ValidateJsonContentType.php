<?php

namespace App\Http\Middleware;

use App\Enum\ContentType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValidateJsonContentType
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->headers->get('Content-Type') !== ContentType::JSON->value) {
            abort(Response::HTTP_UNSUPPORTED_MEDIA_TYPE, 'The accepted Content-Type header is ' . ContentType::JSON->value);
        }

        return $next($request);
    }
}
