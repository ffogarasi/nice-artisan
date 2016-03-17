<?php

namespace FFogarasi\NiceArtisan\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;

class NiceArtisan
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $nice_token = $request->input('_token');

        $config_token = Config('nice-artisan.token');

        if ( !$config_token || $nice_token != $config_token) {

            if (!$this->checkUser($request)) {
                abort(403, 'Access denied');
            }
        }

        return $next($request);
    }

    /**
     * custom user check for which user can have access to the commands
     * @param \App\Http\Middleware\Request $request
     * @return boolean
     */
    protected function checkUser(Request $request) {
        return true;
    }
}