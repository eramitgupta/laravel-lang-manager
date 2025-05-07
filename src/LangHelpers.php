<?php

use LaravelLangSyncInertia\Facades\Lang;

if (!function_exists('lang_file_load')) {
    /**
     * Load one or multiple language files.
     *
     * @param string|array $fileName
     * @return array<string, mixed>
     */
    function lang_file_load(string|array $fileName): array
    {
        return Lang::getFile($fileName);
    }
}
