<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class Language
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
        if (session('applocale')) {
            $configLanguage = config('languages')[session('applocale')];
            setlocale(LC_TIME, $configLanguage[1] . '.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));
        } else {
            session()->put('applocale', config('app.fallback_locale'));
            setlocale(LC_TIME, 'en_US.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));
        }
        return $next($request);
        return $next($request);
    }
}
