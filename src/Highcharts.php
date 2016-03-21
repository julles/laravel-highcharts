<?php namespace Oblagio\Highcharts;

class Highcharts

{
	// public $install = [

	// 	'install' => [
	// 		'jquery' => true,
	// 		'highcharts' => true,
	// 	]
	// ];
	
	public function hello()

	{
		return 'hello';
	}

	public function installJquery()

	{
		return '<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>';
	}

	public function installHighchart()

	{
		return '<script src="http://code.highcharts.com/highcharts.js"></script>';
	}

	public function installExport()
	
	{
		return '<script src="http://code.highcharts.com/modules/exporting.js"></script>';
	}

	public function install()

	{
		return $this->installJquery().$this->installHighchart().$this->installExport();
	}

	public function export($id,$array = [])
	{
		$array = json_encode($array);

		$export = '
			<script>
				$(document).ready(function(){
					$("#'.$id.'").exportChart('.$array.');
				});
			</script>
		';

		return $export;
	}

	public function display($id = "" , $array = [] , $options = ['jquery.js' => true , 'highcharts.js' => true,'exporting.js'=> true])

	{
		// belon sempurna display nya brayse
		
		$array = json_encode($array);

		$jquery = $options['jquery.js'];

		$installJquery = $jquery == true ? $this->installJquery() : '';

		$highcharts = $options['highcharts.js'];

		$installHighchart = $highcharts == true ? $this->installHighchart() : '';


		$exporting = $options['exporting.js'];

		$installExporting = $exporting == true ? $this->installExport() : '';

		$view = $installJquery;

		$view .= $installHighchart;

		$view .= $installExporting;

		$view .= '

			<script type="text/javascript">
			
			$(document).ready(function(){

				$("#'.$id.'").highcharts('.$array.')
				
			});

			</script>
			<div id="'.$id.'" style="width:100%; height:400px;"></div>
		';

		return $view;
	}
}