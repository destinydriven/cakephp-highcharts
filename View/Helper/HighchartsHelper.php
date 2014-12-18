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
class HighchartsHelper extends AppHelper {

        public $helpers = array('Html', 'Session');
        public $charts = null;
        public $chart_name = '';

/**
 * Constructor
 * 
 * @param View
 * @param $options array
 */
        public function __construct(View $View, $options = array()) {
                parent::__construct($View, $options);
                $this->charts = $this->_getCharts();
        }

        public function beforeRender($viewFile) {
                return true;
        }

        public function afterRender($viewFile) {
                CakeSession::delete('HighchartsPlugin.Charts');
        }

        public function beforeLayout($viewFile) {
                parent::beforeLayout($viewFile);

                $js = array('/highcharts/js/highcharts', '/highcharts/js/highcharts-more');
                $theme = $this->_getTheme($this->chart_name);
                $exportingEnabled = $this->_checkExporting($this->chart_name);
                $options3dEnabled = $this->_checkOptions3d($this->chart_name);
                $drillDownEnabled = $this->_checkDrillDown($this->chart_name);

                if ($exportingEnabled) {
                        $js[] = '/highcharts/js/modules/exporting';
                }
                
                if ($options3dEnabled) {
                        $js[] = '/highcharts/js/highcharts-3d.js';
                }

                if ($drillDownEnabled) {
                        array_push($js, '/highcharts/js/modules/drilldown');
                }

                switch ($theme) {
                        case 'gray':
                        case 'grid':
                        case 'dark-blue':
                        case 'dark-green':
                        case 'skies':
                                $js[] = '/highcharts/js/themes/' . $theme;
                                break;
                        default:
                                // $js[] = '/highcharts/js/themes/highroller';
                                break;
                }

                $this->Html->css('highcharts/css/highroller');
                $this->Html->script($js, false);
                return true;
        }

        protected function _getCharts() {
                static $read = false;
                if ($read === true) {
                        return $this->charts;
                } else {
                        $this->charts = CakeSession::read('HighchartsPlugin.Charts');
                        $read = true;
                        return $this->charts;
                }
        }

        protected function _getTheme($name) {
                if (isset($name) && (!empty($this->charts[$name]->chart->className))) {
                        return $this->charts[$name]->chart->className;
                } else {
                        return null;
                }
        }

        protected function _checkExporting($name) {
                if (isset($this->charts[$name]->exporting->enabled) && ($this->charts[$name]->exporting->enabled == true)) {
                        return $this->charts[$name]->exporting->enabled;
                } else {
                        return false;
                }
        }
        
        protected function _checkOptions3d($name) {
                if (isset($this->charts[$name]->chart->options3d->enabled) && ($this->charts[$name]->chart->options3d->enabled == true)) {
                        return $this->charts[$name]->chart->options3d->enabled;
                } else {
                        return false;
                }
        }

        public function render($name) {

                $this->chart_name = $name;

                if (!isset($this->charts[$name])) {
                        trigger_error(sprintf(__('Chart: "%s" could not be found. Ensure that Chart Name is the same string that is passed to $this->Highcharts->render() in your view.', $this->chart_name), null), E_USER_ERROR);
                        return;
                }

                $_jsonOptions = $this->charts[$name]->getChartOptionsObject();

                // fix issue with quotes ("") wrapping js functions in json
                $jsonOptions = preg_replace('/"(\(?function.+?}(\)\(\))?)"/', '$1', $_jsonOptions);

                // this section from HighRoller::renderChart()		
                $options = new HighRollerOptions();

                // prepare PHP vars for chartJS script
                $json_options = json_encode($options);
                $chart_title = $this->charts[$name]->title->text;
                $chart_type = $this->charts[$name]->chart->type;
                $renderTo = $this->charts[$name]->chart->renderTo;

                $chartJS = <<<EOF
$(document).ready(function() {
    // HIGHROLLER - HIGHCHARTS UTC OPTIONS 
    Highcharts.setOptions(
        {$json_options}
    );
    // HIGHROLLER - HIGHCHARTS '{$chart_title}' {$chart_type} chart

    var {$renderTo} = new Highcharts.Chart(
        {$jsonOptions}
    );
    
    //for column drilldown
    function setChart(name, categories, data, color) {
        {$renderTo}.xAxis[0].setCategories(categories);
        {$renderTo}.series[0].remove();
        {$renderTo}.addSeries({
            name: name,
            data: data,
            color: color || 'white'
        });
    }   
});
EOF;

                $out = trim($chartJS);

                return $this->Html->scriptBlock($this->output($out), array('defer' => false));
        }

        private function _checkDrillDown($chart_name) {
                if (isset($this->charts[$chart_name]->drilldown->series) && count($this->charts[$chart_name]->drilldown->series) > 0) {
                        return false;
                } else {
                        return true;
                }
        }

}
