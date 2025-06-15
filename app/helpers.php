<?php

use App\Models\Setting;

function image($path)
{
    return asset('storage/'.$path);
}

function settingsData($key = null, $default = null)
{
    $settings = cache()->rememberForever('global_settings', function () {
        return Setting::pluck('value', 'key')->toArray();
    });

    if ($key) {
        return $settings[$key] ?? $default;
    }

    return $settings;
}
