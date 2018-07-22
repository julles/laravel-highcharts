<?php

namespace RezaAr\Highcharts\Classes\Presenters;

class ContainerPresenter
{
    public $container;

    public function __construct()
    {
        $this->container = '';
    }

    public function container($id = 'container')
    {
        $this->container = '<div id="'.$id.'"></div>';

        return $this->container;
    }
}
