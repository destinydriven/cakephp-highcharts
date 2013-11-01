<?php
/**
 *  CakePHP HighCharts Plugin
 * 
 * 	Copyright (C) 2012 Kurn La Montagne / destinydriven
 *	<https://github.com/destinydriven> 
 * 
 * 	Multi-licensed under:
 * 		MPL <http://www.mozilla.org/MPL/MPL-1.1.html>
 * 		LGPL <http://www.gnu.org/licenses/lgpl.html>
 * 		GPL <http://www.gnu.org/licenses/gpl.html>
 * 		Apache License, Version 2.0 <http://www.apache.org/licenses/LICENSE-2.0.html>
 */
class HighChartsHelper extends AppHelper {
    public $helpers = array('Html', 'Session');
    public $charts = null;
    public $chart_name = '';

    /**
     * Constructor.
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
        CakeSession::delete('HighChartsPlugin.Charts');
    }
    
    public function beforeLayout($viewFile) {       
        parent::beforeLayout($viewFile);
        
        $js = array('/high_charts/js/highcharts');        
        $theme = $this->_getTheme($this->chart_name);        
        $exportingEnabled = $this->_checkExporting($this->chart_name);
        
        if($exportingEnabled){
                $js[] = '/high_charts/js/modules/exporting';
        }
        
        switch ($theme){
            case 'gray':               
            case 'grid':                 
            case 'dark-blue':                      
            case 'dark-green':                
            case 'skies':
                $js[] = '/high_charts/js/themes/'.$theme;
                break;
            default:
               // $js[] = '/high_charts/js/themes/highroller';
                break;
        }
        
        $this->Html->css('high_charts/css/highroller');
        $this->Html->script( $js, FALSE);
        return true;
    }

    protected function _getCharts() {
        static $read = false;
        if ($read === true) {
            return $this->charts;
        } else{
            $this->charts = CakeSession::read('HighChartsPlugin.Charts');
            $read = true;
            return $this->charts;
        }
    }
    
    protected function _getTheme($name) {
        if(isset($name) && (!empty($this->charts[$name]->chart->className))){
           return $this->charts[$name]->chart->className;
        } else {
            return null;
        }
    }
    
     protected function _checkExporting($name) {
        if(isset($this->charts[$name]->exporting->enabled) && ($this->charts[$name]->exporting->enabled  == TRUE)){
           return $this->charts[$name]->exporting->enabled;
        } else {
            return FALSE;
        }
    }

    public function render($name) {
        
        $this->chart_name = $name;

        if (!isset($this->charts[$name])) {
            trigger_error(sprintf(__('Chart: "%s" could not be found. Ensure that Chart Name is the same string that is passed to $this->HighCharts->render() in your view.', true), $name), E_USER_ERROR);
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

        return $this->Html->scriptBlock($this->output($out), array('defer' => FALSE));	
    }
	
}
