<?php namespace Oblagio\Highcharts;

use Illuminate\Support\Facades\Facade as FacadeClass;

class Facade extends FacadeClass

{

	public static function getFacadeAccessor()

	{
		return 'register-highcharts';
	}

}