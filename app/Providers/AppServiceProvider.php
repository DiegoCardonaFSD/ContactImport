<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


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
        Paginator::useBootstrap();
        $this->dateMultiFormat();
    }

    private function dateMultiFormat(){
        Validator::extend('date_multi_format', function($attribute, $value, $formats) {
            foreach($formats as $format) {
                $parsed = date_parse_from_format($format, $value);
                if ($parsed['error_count'] === 0 && $parsed['warning_count'] === 0) {
                    return true;
                }
            }
            return false;
        });
    }
}
