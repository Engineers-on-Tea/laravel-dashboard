<?php

namespace App\Http\Middleware;

use App\Bll\Lang;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
        $segments = $request->segments();
        // dd($segments);
        $segment = $segments[0];
        $supportedLocales = config('laravel-gettext.supported-locales');
        if ($segment && in_array($segment, $supportedLocales)) {
            $code = $segment;
        } else {
            $code = Lang::getAdminLangCode();
        }

        app()->setLocale($code);

        LaravelGettext::setLocale($code);
        Session::put('locale', $code);

        return $next($request);
    }
}
