<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('date', function (string $expression) {
            return "<?php echo date('Y-m-d', strtotime($expression)); ?>";
        });

        Blade::directive('capitalize', function (string $expression) {
            return "<?php echo ucwords(strtolower($expression)); ?>";
        });

        Blade::directive('status', function (string $expression) {
            return "<?php echo App\Enums\Status::from($expression)->name; ?>";
        });

        Http::macro('info', function () {
            $url = config('app.info_api');

            $http = Http::baseUrl($url);

            return $http;
        });

        switch (config('app.env')) {
            case 'local':Mail::alwaysTo('ahilman@indonesian-aerospace.com');
            case 'dev':
                Mail::alwaysTo('ahilman@indonesian-aerospace.com');
                break;
            case 'test':
                Mail::alwaysTo('qa-it@indonesian-aerospace.com');
                break;
            default:
                break;
        }

        URL::forceScheme(config('app.protocol'));
    }
}
