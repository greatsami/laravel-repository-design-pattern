<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if (!$request->routeIs('auth.*')) {

            if (!$request->user() || !$request->user()->currentAccessToken()) {
                throw new AuthenticationException;
            }

            $routeAbilities = $request->route()->middleware();

            $abilities = array();
            $abilityCaughtLine = "";
            $abilitiesCaughtLine = "";
            foreach ($routeAbilities as $routeAbility) {
                if (Str::contains($routeAbility, 'ability:')) {
                    $abilityCaughtLine .= str_replace('ability:', '', $routeAbility);
                }
                if (Str::contains($routeAbility, 'abilities:')) {
                    $abilitiesCaughtLine .= str_replace('abilities:', '', $routeAbility);
                }
                $abilities = is_null($abilityCaughtLine) && is_null($abilitiesCaughtLine)
                    ? []
                    : array_merge(explode(',', $abilityCaughtLine), explode(',', $abilitiesCaughtLine));
            }

            // dd($routeAbilities, $abilities);

            foreach ($abilities as $ability) {
                if ($request->user()->tokenCan($ability)) {
                    return true;
                }
            }
            return response(["error" => "User unauthorized"], 401);
            // throw new MissingAbilityException($abilities);
        }
        return true;
    }
}
