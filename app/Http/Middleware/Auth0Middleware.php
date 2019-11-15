<?php

namespace App\Http\Middleware;

use Auth0\SDK\JWTVerifier;
use Closure;

class Auth0Middleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json('No token provided', 401);
        }

        $this->validateAndDecode($token);

        return $next($request);
    }

    public function validateAndDecode($token)
    {
        try {
            $verifier = new JWTVerifier([
                'supported_algs' => ['RS256'],
                'valid_audiences' => ['adcashapi.com'],
                'authorized_iss' => ['https://chanu1993.auth0.com/'],
            ]);

            $decoded = $verifier->verifyAndDecode($token);
        } catch (\Auth0\SDK\Exception\CoreException $e) {
            throw $e;
        };
    }

}
