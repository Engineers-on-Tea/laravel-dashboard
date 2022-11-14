<?php

namespace App\Http\Middleware;

use App\Bll\Lang;
use Closure;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Anubixo\LaravelGettext\Facades\LaravelGettext;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $segments = $request->segments();
        $segment = $segments[0];
        $supportedLocales = config('laravel-gettext.supported-locales');
        if ($segment && in_array($segment, $supportedLocales)) {
            $code = $segment;
        } else {
            $code = Lang::getAdminLangCode();
        }

        App::setLocale($code);

        LaravelGettext::setLocale($code);
        Session::put('locale', $code);

        return $next($request);
    }
}
