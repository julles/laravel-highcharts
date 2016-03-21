# Laravel 5 Highcharts Packages

[![Total Downloads](https://poser.pugx.org/muhamadrezaar/highcharts/d/total.svg)](https://packagist.org/packages/muhamadrezaar/highcharts)
[![Latest Stable Version](https://poser.pugx.org/muhamadrezaar/highcharts/v/stable.svg)](https://packagist.org/packages/muhamadrezaar/highcharts/v/stable.svg)
[![License](https://poser.pugx.org/muhamadrezaar/highcharts/license.svg)](https://packagist.org/packages/muhamadrezaar/highcharts)


Package Highcharts untuk Laravel 5

### Installasi

Tambahkan Package pada composer.json
```sh
composer require muhamadrezaar/highcharts
```
setelah package terdownload , register  provider  dan facade nya

Provider :
```sh
Oblagio\Highcharts\Provider::class
```
Facade :
```sh
'Chart' => Oblagio\Highcharts\Facade::class,
```

### Cara penggunaaan

```sh

<?php
$charts = [

    'chart' => ['type' => 'column'],
    'title' => ['text' => 'fruit Consumption'],
    'xAxis' => [
        'categories' => ['apples' , 'bananas'],
    ],
    'yAxis' => [
        'title' => [
            'text' => 'Fruit Eaten'
        ]
    ],
    'series' => [
        [
            'name' => 'Reza',
            'data' => [1,2]
        ],
        [
            'name' => 'Kika',
            'data' => [2,4]
        ],
    ]
];

    echo Chart::display("id-highchartsnya", $charts);


?>
```
Versi Blade

```sh

{!! Chart::display("id-highchartsnya", $charts) !!}

```
Output :

![alt tag](http://s17.postimg.org/uig89a9xr/chart.png)


## License

MIT

