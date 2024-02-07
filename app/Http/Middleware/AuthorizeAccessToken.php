<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorization = $request->header('Authorization');

        if (! $authorization) {
            abort(401, 'An access token is required to access this resource.');
        }

        $token   = hash('sha256', $authorization);
        $project = Project::where('access_token', $token)->first();

        if (! $project) {
            abort(401, 'Invalid access token');
        }

        $request->merge(['project' => $project]);

        return $next($request);
    }
}
