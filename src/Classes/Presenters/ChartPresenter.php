<?php

namespace RezaAr\Highcharts\Classes\Presenters;

class ChartPresenter
{
    public $display;
    public $initJs;
    public $title;

    public function __construct()
    {
        $this->display = '';
        $this->js = new InitJsPresenter();
        $this->js->highchart = config('highchart.series_label_js');
        $this->js->seriesLabel = config('highchart.highchart_js');
        $this->js->exporting = config('highchart.exporting_js');
        $this->js->exportData = config('highchart.export_data_js');
        $this->container = new ContainerPresenter();
        $this->transform = new JsTransformerPresenter();
        $this->title = [];
    }

    public function highcart_js($bool = true)
    {
        $this->js->highchart = $bool;

        return $this;
    }

    public function series_label_js($bool = true)
    {
        $this->js->seriesLabel = $bool;

        return $this;
    }

    public function exporting_js($bool = true)
    {
        $this->js->exporting = $bool;

        return $this;
    }

    public function export_data_js($bool = true)
    {
        $this->js->exportData = $bool;

        return $this;
    }

    public function getInitJs()
    {
        $this->display .= $this->js->generate();
        $this->js->init = false;

        return $this;
    }

    public function container($container = 'container')
    {
        $this->transform->container = $container;

        return $this;
    }

    public function title($title = [])
    {
        $this->transform->title = $title;

        return $this;
    }

    public function subtitle($subtitle = [])
    {
        $this->transform->subtitle = $subtitle;

        return $this;
    }

    public function yaxis($data = [])
    {
        $this->transform->yAxis = $data;

        return $this;
    }

    public function xaxis($data = [])
    {
        $this->transform->xAxis = $data;

        return $this;
    }

    public function legend($legend = [])
    {
        $this->transform->legend = $legend;

        return $this;
    }

    public function plotOptions($plotOptions = [])
    {
        $this->transform->plotOptions = $plotOptions;

        return $this;
    }

    public function tooltip($tooltip = [])
    {
        $this->transform->tooltip = $tooltip;

        return $this;
    }

    public function series($series = [])
    {
        $this->transform->series = $series;

        return $this;
    }

    public function chart($series = [])
    {
        $this->transform->chart = $series;

        return $this;
    }

    public function colors($series = [])
    {
        $this->transform->colors = $series;

        return $this;
    }

    public function credits($credits = [])
    {
        $this->transform->credits = $credits;

        return $this;
    }

    public function getTransform()
    {
        $this->display .= $this->transform->transform();

        return $this;
    }

    public function tes($tes)
    {
        $this->display .= $tes;

        return $this;
    }

    public function display()
    {
        $this->getInitJs();
        $this->getTransform();
        $display = $this->display;
        $this->display = null;

        return $display;
    }
}
