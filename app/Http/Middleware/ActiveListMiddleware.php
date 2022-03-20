<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class ActiveListMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->getUser()->u_type == "Pusat Mel Officer" || $this->auth->getUser()->u_type == "Pusat Mel Officer (Admin)" ) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
