<?php

use App\Models\ContentBlock;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    /**
     * Get a setting value by key.
     * Cached for 1 hour for performance.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = Setting::where('key', $key)
                ->where('is_active', true)
                ->first();

            if (! $setting) {
                return $default;
            }

            // For text type, return the raw value
            if ($setting->type === 'text') {
                return $setting->value ?? $default;
            }

            // For image type, return the value (URL/path)
            if ($setting->type === 'image') {
                return $setting->value ?? $default;
            }

            // For json_array type, return the decoded array
            return $setting->value ?? $default;
        });
    }
}

if (! function_exists('content_block')) {
    /**
     * Get a content block's translated content by key.
     * Respects the current application locale for translation.
     * Cached per locale for 1 hour.
     *
     * @param string $key
     * @param string|null $locale
     * @param mixed $default
     * @return mixed
     */
    function content_block(string $key, ?string $locale = null, mixed $default = null): mixed
    {
        $locale = $locale ?? app()->getLocale();

        return Cache::remember("content_block.{$key}.{$locale}", 3600, function () use ($key, $locale, $default) {
            $block = ContentBlock::where('key', $key)
                ->where('is_active', true)
                ->first();

            if (! $block) {
                return $default;
            }

            return $block->getTranslation('content', $locale) ?? $default;
        });
    }
}

if (! function_exists('clear_setting_cache')) {
    /**
     * Clear cached setting by key.
     *
     * @param string $key
     * @return void
     */
    function clear_setting_cache(string $key): void
    {
        Cache::forget("setting.{$key}");
    }
}

if (! function_exists('clear_content_block_cache')) {
    /**
     * Clear cached content block by key for all locales.
     *
     * @param string $key
     * @return void
     */
    function clear_content_block_cache(string $key): void
    {
        foreach (['en', 'ar'] as $locale) {
            Cache::forget("content_block.{$key}.{$locale}");
        }
    }
}
