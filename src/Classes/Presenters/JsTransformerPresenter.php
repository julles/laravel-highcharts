<?php

namespace RezaAr\Highcharts\Classes\Presenters;

class JsTransformerPresenter
{
    public $title = [];
    public $subtitle = [];
    public $transform = [];
    public $yAxis = [];
    public $xAxis = [];
    public $legend = [];
    public $plotOptions = [];
    public $series = [];
    public $tooltip = [];
    public $chart = [];
    public $colors = [];
    public $credits = [];
    public $container = 'container';

    public function __contruct()
    {
        $this->transform = '';
    }

    public function encode_title()
    {
        $data = $this->title;

        $this->title = !empty($data) ? 'title: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function encode_sub_title()
    {
        $data = $this->subtitle;

        $this->subtitle = !empty($data) ? 'subtitle: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function encode_y_axis()
    {
        $data = $this->yAxis;

        $this->yAxis = !empty($data) ? 'yAxis: '.json_encode($data).',' : null;

        return $this;
    }

    public function encode_x_axis()
    {
        $data = $this->xAxis;
        $this->xAxis = !empty($data) ? 'xAxis: '.json_encode($data).',' : null;

        return $this;
    }

    public function encode_legend()
    {
        $data = $this->legend;

        $this->legend = !empty($data) ? 'legend: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function encode_plot_options()
    {
        $data = $this->plotOptions;

        $this->plotOptions = !empty($data) ? 'plotOptions: '.json_encode($data).',' : null;

        return $this;
    }

    public function encode_tooltip()
    {
        $data = $this->tooltip;

        $this->tooltip = !empty($data) ? 'tooltip: '.json_encode($data).',' : null;

        return $this;
    }

    public function encode_series()
    {
        $data = $this->series;

        $this->series = !empty($data) ? 'series: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function encode_chart()
    {
        $data = $this->chart;

        $this->chart = !empty($data) ? 'chart: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function encode_colors()
    {
        $data = $this->colors;
        $this->colors = !empty($data) ? 'colors: '.json_encode($data).',' : null;

        return $this;
    }

    public function credits()
    {
        $data = $this->credits;
        $this->credits = !empty($data) ? 'credits: '.json_encode($data, JSON_UNESCAPED_UNICODE).',' : null;

        return $this;
    }

    public function replacer($string)
    {
        $chars = [
            '\\n',
            '\\t',
            '"startJs:',
            '}"',
            '\\',
            ':endJs"',
        ];
        $replace = ['', '', '', '', ''];

        return str_replace($chars, $replace, $string);
    }

    public function transform()
    {
        $this->encode_title();
        $this->encode_sub_title();
        $this->encode_y_axis();
        $this->encode_x_axis();
        $this->encode_legend();
        $this->encode_plot_options();
        $this->encode_tooltip();
        $this->encode_series();
        $this->encode_chart();
        $this->encode_colors();
        $this->credits();

        $allString = $this->title.
        $this->subtitle.
        $this->yAxis.
        $this->xAxis.
        $this->legend.
        $this->plotOptions.
        $this->tooltip.
        $this->series.
        $this->chart.
        $this->colors.
        $this->credits;

        $allString = substr($allString, 0, -1);
        $allString = $this->replacer($allString);
        $generate = '<script type="text/javascript">';
        $generate .= 'Highcharts.chart({'.$allString.'});';
        $generate .= '</script>';

        return $generate;
    }
}
