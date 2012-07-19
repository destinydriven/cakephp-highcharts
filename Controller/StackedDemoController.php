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
 */
class StackedDemoController extends HighChartsAppController
{
	public $name = 'StackedDemo';
	public $components = array('HighCharts.HighCharts');
	public $helpers = array('HighCharts.HighCharts');
	public $uses = array();
	public $layout = 'chart.demo';

	/**
	 * HighCharts component
	 *
	 * @var HighChartsComponent
	 */
	public $HighCharts = null;

	public function column()
	{
	}

	public function line()
	{
	}

	public function bar()
	{
	}

	function area()
	{
	}
}
