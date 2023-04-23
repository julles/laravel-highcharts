# Laravel 5 Highcharts Packages

[![Total Downloads](https://poser.pugx.org/muhamadrezaar/highcharts/d/total.svg)](https://packagist.org/packages/muhamadrezaar/highcharts)
[![License](https://poser.pugx.org/muhamadrezaar/highcharts/license.svg)](https://packagist.org/packages/muhamadrezaar/highcharts)
[![License](https://img.shields.io/github/release/julles/laravel-highcharts.svg?style=flat-square)](https://github.com/julles/laravel-highcharts/releases)
[![StyleCi](https://github.styleci.io/repos/49810531/shield)](https://github.styleci.io/repos/49810531/shield)

Package Highcharts for Laravel 5

### Installations

Add Package to composer.json

```sh
composer require muhamadrezaar/highcharts:dev-master
```
In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider and facade in config/app.php file:

Provider :
```sh
RezaAr\Highcharts\Provider::class,
```
Facade :
```sh
'Chart' => RezaAr\Highcharts\Facade::class,
```

then publish the config 

``` sh
php artisan vendor:publish
```

### Basic Usage

In Controller or Other Class

```sh

<?php
    $chart1 = \Chart::title([
        'text' => 'Voting ballon d`or 2018',
    ])
    ->chart([
        'type'     => 'line', // pie , columnt ect
        'renderTo' => 'chart1', // render the chart into your div with id
    ])
    ->subtitle([
        'text' => 'This Subtitle',
    ])
    ->colors([
        '#0c2959'
    ])
    ->xaxis([
        'categories' => [
            'Alex Turner',
            'Julian Casablancas',
            'Bambang Pamungkas',
            'Mbah Surip',
        ],
        'labels'     => [
            'rotation'  => 15,
            'align'     => 'top',
            'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs', 
            // use 'startJs:yourjavasscripthere:endJs'
        ],
    ])
    ->yaxis([
        'text' => 'This Y Axis',
    ])
    ->legend([
        'layout'        => 'vertikal',
        'align'         => 'right',
        'verticalAlign' => 'middle',
    ])
    ->series(
        [
            [
                'name'  => 'Voting',
                'data'  => [43934, 52503, 57177, 69658],
                // 'color' => '#0c2959',
            ],
        ]
    )
    ->display();

    return view('welcome', [
        'chart1' => $chart1,
    ]);


?>
```
In Blade

```sh

<div id="chart1"></div>

{!! $chart1 !!}

```
Output :

![alt tag](https://preview.ibb.co/mKrfSy/chart2.png)


the package will generate this code in yout view : 

``` sh 

<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart( {
    title: {
        "text": "Voting ballon d`or 2018"
    }
    , subtitle: {
        "text": "This Subtitle"
    }
    , yAxis: {
        "text": "This Y Axis"
    }
    , xAxis: {
        "categories":["Messi", "CR7", "Bambang Pamungkas", "Del Piero"], "labels": {
            "rotation":15, "align":"top", "formatter":function() {
                return this.value + " (Footbal Player)"
            }
        }
    }
    , legend: {
        "layout": "vertikal", "align": "right", "verticalAlign": "middle"
    }
    , series: [ {
        "name": "Voting", "data": [43934, 52503, 57177, 69658]
    }
    ], chart: {
        "type": "line", "renderTo": "chart1"
    }
    , colors: ["#0c2959"], credits:false
}

);
</script>


```

cdn highcharts.js and others js only generated one time

## License

https://reza.mit-license.org/

Buy me a cup of coffee
https://trakteer.id/mreza.id

