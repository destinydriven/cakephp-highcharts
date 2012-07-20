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
class MixedChartsDemoController  extends HighChartsAppController {
	public $name = 'MixedChartsDemo';
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

	public function mixed_charts() {
		$chartData1 = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
		$chartData2 = array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5);

		$chartData3 = array( array('name' => 'Chrome', 'y' => 45.0, 'sliced' => true, 'selected' => true), array('IE', 26.8), array('Firefox', 12.8), array('Safari', 8.5), array('Opera', 6.2), array('Others', 0.7));

		$chartNameOne = 'Line Chart';
		$chartNameTwo = 'Column Chart';
		$chartNameThree = 'Pie Chart';

		$mychartOne = $this -> HighCharts -> create($chartNameOne, array('type' => 'line', 'exporting' => TRUE));

		$mychartTwo = $this -> HighCharts -> create($chartNameTwo, array('type' => 'column', 'exporting' => TRUE));

		$mychartThree = $this -> HighCharts -> create($chartNameThree, array('type' => 'pie', 'exporting' => TRUE));

		$this -> HighCharts -> setChartParams($chartNameOne, array('renderTo' => 'linewrapper', // div to display chart inside
		'chartWidth' => 800, 'chartHeight' => 600, 'title' => 'Monthly Sales Summary - Line', 'yAxisTitleText' => 'Units Sold', 'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'), 'creditsEnabled' => FALSE));

		$this -> HighCharts -> setChartParams($chartNameTwo, array('renderTo' => 'columnwrapper', // div to display chart inside
		'chartWidth' => 800, 'chartHeight' => 600, 'title' => 'Monthly Sales Summary - Column', 'yAxisTitleText' => 'Y Axis Title Text', 'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'), 'creditsText' => 'Example.com', 'creditsURL' => 'http://example.com'));

		$this -> HighCharts -> setChartParams($chartNameThree, array('renderTo' => 'piewrapper', // div to display chart inside
		'chartWidth' => 800, 'chartHeight' => 600, 'title' => 'Browser Usage Statistics', 'creditsText' => 'Example.com', 'creditsURL' => 'http://example.com', 'plotOptionsShowInLegend' => TRUE, ));

		$seriesOne = $this -> HighCharts -> addChartSeries();
		$seriesTwo = $this -> HighCharts -> addChartSeries();
		$seriesThree = $this -> HighCharts -> addChartSeries();

		$seriesOne -> addName('Tokyo') -> addData($chartData1);
		$seriesTwo -> addName('London') -> addData($chartData2);
		$seriesThree -> addName('New York') -> addData($chartData3);

		$mychartOne -> addSeries($seriesOne);
		$mychartTwo -> addSeries($seriesTwo);
		$mychartThree -> addSeries($seriesThree);

	}

	public function column() {
		// TODO
	}

}
