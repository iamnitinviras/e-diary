<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    //Custom variable
    'date_time_format' => env('APP_DATE_TIME_FORMAT', 'Y-m-d H:i:s'),
    'date_format' => env('APP_DATE_FORMAT', 'Y-m-d'),
    'time_format' => env('APP_TIME_FORMAT', 'H:i:s'),

    'seo_keyword' => env('SEO_KEYWORD'),
    'seo_description' => env('SEO_DESCRIPTION'),
    'seo_image' => env('SEO_IMAGE','/front-images/auth-bg.png'),
    'footer_text' => env('FOOTER_TEXT'),
    'about_author' => env('ABOUT_AUTHOR'),

    'facebook_url' => env('FACEBOOK_URL'),
    'instagram_url' => env('INSTAGRAM_URL'),
    'twitter_url' => env('TWITTER_URL'),
    'youtube_url' => env('YOUTUBE_URL'),
    'linkedin_url' => env('LINKEDIN_URL'),
    'support_email' => env('SUPPORT_EMAIL'),
    'support_phone' => env('SUPPORT_PHONE'),
    'per_page' => env('PER_PAGE', 15),

    'enable_captcha_on_comments' => env('ENABLE_CAPTCHA_ON_COMMENTS', false),
    'enable_captcha_on_contact_us' => env('ENABLE_CAPTCHA_ON_CONTACT_US', false),
    'enable_captcha' => env('ENABLE_CAPTCHA', false),
    'nocaptcha_secret' => env('NOCAPTCHA_SECRET', ''),
    'nocaptcha_sitekey' => env('NOCAPTCHA_SITEKEY', ''),

    'trial_days' => env('TRIAL_DAYS', 14),
    'trial_branch' => env('TRIAL_BRANCH', 1),
    'trial_staff' => env('TRIAL_STAFF', 1),

    'app_light_logo' => env('APP_LIGHT_LOGO', '/front-images/logo.png'),
    'app_dark_logo' => env('APP_DARK_LOGO', '/front-images/logo.png'),
    'logo' => env('APP_DARK_SMALL_LOGO', '/front-images/logo.png'),
    'favicon_icon' => env('APP_FAVICON_ICON', '/front-images/logo-light.png'),

    'banner_image_one' => env('BANNER_IMAGE_ONE', '/front-images/auth-bg.png'),
    'banner_image_two' => env('BANNER_IMAGE_TWO', '/front-images/auth-bg.png'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
