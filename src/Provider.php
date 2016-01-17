<?php namespace Oblagio\Highcharts;

use Illuminate\Support\ServiceProvider;

use Oblagio\Highcharts\Highcharts;

class Provider extends ServiceProvider
{
	
	public function boot()

	{

	}

	public function register()

	{
		$this->app->bind('register-highcharts' , function(){

			return new Highcharts;

		});
	}
}