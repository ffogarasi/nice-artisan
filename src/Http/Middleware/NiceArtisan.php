<?php

namespace FFogarasi\NiceArtisan\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use \Illuminate\Http\Response;

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
                if ($request->ajax()) {
                    $response = new Response('Access denied', 403);
                    $response->header('Content-Type', 'text/plain');
                    return $response;
                }
                else {
                    return redirect()->to('/')->with('error', 'Acces denied!');
                }
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