<?php

/**
 *  CakePHP Highcharts Plugin
 * 
 * 	Copyright (C) 2014 Kurn La Montagne / destinydriven
 * 	<https://github.com/destinydriven> 
 * 
 * 	Multi-licensed under:
 * 		MPL <http://www.mozilla.org/MPL/MPL-1.1.html>
 * 		LGPL <http://www.gnu.org/licenses/lgpl.html>
 * 		GPL <http://www.gnu.org/licenses/gpl.html>
 * 		Apache License, Version 2.0 <http://www.apache.org/licenses/LICENSE-2.0.html>
 */
App::uses('HighchartsAppController', 'Highcharts.Controller');

/**
 * @property HighchartsController $Highcharts
 */
class HighchartsDemoController extends HighchartsAppController {

        public $name = 'HighchartsDemo';
        public $components = array('Highcharts.Highcharts');
        public $helpers = array('Highcharts.Highcharts');
        public $uses = array();
        public $layout = 'chart.demo';

        public function index() {
                
        }

}
