<?php

namespace LaravelLangSyncInertia\Middleware;

use Closure;
use Inertia\Inertia;
use LaravelLangSyncInertia\Facades\Lang;

class ShareLangTranslations
{
    public function handle($request, Closure $next)
    {
        $translations = Lang::getLoaded();

        if (! empty($translations)) {
            Inertia::share([
                'lang' => $translations,
            ]);
        }

        return $next($request);
    }
}
