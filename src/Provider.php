<?php

namespace RezaAr\Highcharts;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/highchart.php' => config_path('highchart.php'),
        ], 'highchart_config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/highchart.php', 'highchart'
        );

        $this->app->bind('register-highcharts', function () {
            return new Highcharts();
        });
    }
}
