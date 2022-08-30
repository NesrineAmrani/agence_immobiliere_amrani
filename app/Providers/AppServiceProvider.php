<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // On défini le "français" comme langue globale de l'application
        \App::setLocale('fr');

        
        Schema::defaultStringLength(191);
        \Carbon\Carbon::setLocale(config('app.locale'));

        Blade::directive('money', function ($amount) {
            return "<?= number_format($amount, 2); ?>";
        });
        Str::macro('money', function ($amount, $symbol = 'MAD') {
            return number_format($amount, 2) . $symbol;
        });
    }
}
