<?php

namespace App\Http\Middleware;

use App\Bll\Lang;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) && $request->segment(1) != 'admin') {
            $code = $request->segment(1);
            $supportedLocales = config('laravel-gettext.supported-locales');
            if (!in_array($code, $supportedLocales)) {
                $code = config('laravel-gettext.fallback-locale');
            }
        } else {
            $code = Lang::getAdminLangCode();
        }

        App::setLocale($code);
        LaravelGettext::setLocale($code);

        return $next($request);
    }
}
