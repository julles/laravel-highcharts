<?php namespace Oblagio\Highcharts;

class Highcharts

{
	public function hello()
	{
		return 'hello';
	}

	public function installJquery()
	{
		return '<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>';
	}

	public function installHighchart()
	{
		return '<script src="//code.highcharts.com/highcharts.js"></script>';
	}

	public function installExport()
	{
		return '<script src="//code.highcharts.com/modules/exporting.js"></script>';
	}

	public function install()
	{
		return $this->installJquery().$this->installHighchart().$this->installExport();
	}

	public function export($id,$array = [])
	{
		$array = json_encode($array);

		$export = '
			<script type="text/javascript">
				$(document).ready(function(){
					$("#'.$id.'").exportChart('.$array.');
				});
			</script>
		';

		return $export;
	}

	public function display($id = "" , $array = [] , $options = ['jquery.js' => true , 'highcharts.js' => true,'exporting.js'=> true,'format' => 'chart'])
	{
		$array = json_encode($array);

		$jquery = !isset($options['jquery.js']) ? $options['jquery.js'] = true : $options['jquery.js'];

		$installJquery = $jquery == true ? $this->installJquery() : '';

		$highcharts = !isset($options['highcharts.js']) ? $options['highcharts.js'] = true : $options['highcharts.js'];

		$installHighchart = $highcharts == true ? $this->installHighchart() : '';

		$exporting = !isset($options['exporting.js']) ? $options['exporting.js'] = true : $options['exporting.js'];

		$installExporting = $exporting == true ? $this->installExport() : '';

		$view = $installJquery;

		$view .= $installHighchart;

		$view .= $installExporting;

		$view .= '

			<script type="text/javascript">
			
			$(document).ready(function(){

				$("#'.$id.'").highcharts('.$array.');
				
				var chart = $("#'.$id.'").highcharts(),
		        
		        svg = chart.getSVG();
				
				format = "'.$options['format'].'";

				if(format == "svg")
				{
				    $("#'.$id.'").text(svg);
		        }else if(format == "base64"){
		        	base = "data:image/svg+xml;base64," + btoa(svg);
		       		$("#'.$id.'").text(base);
		        }

			});

			</script>
			
			<div id="'.$id.'" style="width:100%; height:400px;"></div>

		';
		return $view;
	}


}