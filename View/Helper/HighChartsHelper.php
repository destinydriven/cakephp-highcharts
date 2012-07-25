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
class HighChartsHelper extends AppHelper
{
	public $helpers = array('Html', 'Session');
	public $charts = array();
	
	
	/**
	 * Constructor.
	 * 
	 * @param View
	 * @param $options array
	 */
	public function __construct(View $View, $options = array())
	{
		parent::__construct($View, $options);	  
	}	

	public function beforeRender($viewFile)
	{
		$this->Html->css('high_charts/css/highroller');	
		
		$this->Html->script(array( '/high_charts/js/jquery.min', '/high_charts/js/highcharts', '/high_charts/js/modules/exporting' ), FALSE);  
		
		return true;
	}

	public function afterRender($viewFile)
	{
		CakeSession::delete('HighChartsPlugin.Charts');
	}

	public function _getCharts()
	{
		static $read = false;

		if ($read === true)
		{
			return $this->charts;
		}

		$this->charts = CakeSession::read('HighChartsPlugin.Charts');

		$read = true;

		return $this->charts;
	}

	public function render($name)
	{	
		$charts = $this->_getCharts();

		 if (!isset($charts[$name]))
		{
			trigger_error(sprintf(__('Chart %s could not be found', true), $charts[$name]), E_USER_ERROR);
			return;
		}

		return $this->Html->scriptBlock($this->output($charts[$name]->renderChart()), array('defer' => FALSE));
	}
}

