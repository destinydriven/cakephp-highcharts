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
class MixedChartsDemoController  extends HighChartsAppController
{
	var $name = 'MixedChartsDemo';
	var $components = array('HighCharts.HighCharts');
	var $helpers = array('HighCharts.HighCharts');
	var $uses = array();
	var $layout = 'chart.demo';

	/**
	 * HighCharts component
	 *
	 * @var HighChartsComponent
	 */
	public $HighCharts = null;

	public function mixed_charts()
	{
		$chartData1 = array
				(
					7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6
				);
		$chartData2 = array
				(
					-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5
				);
				
		$chartData3 = array(
				array(
						'name' => 'Chrome',
                     	'y' => 45.0,
                     	'sliced' => true,
                     	'selected' => true
					),
				array('IE', 26.8),
				array('Firefox', 12.8),
				array('Safari', 8.5),
				array('Opera', 6.2),
				array('Others', 0.7)
			);
				
		$chartNameOne   = 'Line Chart';
		$chartNameTwo   = 'Column Chart';
		$chartNameThree = 'Pie Chart';
		
		$mychartOne = $this->HighCharts->create
										 (
											$chartNameOne,
											array
											(
												'type' => 'line',
												'exporting' => TRUE
											)
										 );
										 
	   $mychartTwo = $this->HighCharts->create
										 (
											$chartNameTwo,
											array
											(
												'type' => 'column',
												'exporting' => TRUE
											)
										 );
										
		$mychartThree = $this->HighCharts->create
										 (
											$chartNameThree,
											array
											(
												'type' => 'pie',
												'exporting' => TRUE
											)
										 );

	
	   	$this->HighCharts->setChartParams
			(
				$chartNameOne,
				array
				(
					'renderTo'					=> 'linewrapper',  // div to display chart inside
					'chartWidth'				=> 800,
					'chartHeight'				=> 600,					
					'title'						=> 'Monthly Sales Summary - Line',					
					'yAxisTitleText' 			=> 'Units Sold',
					'xAxisCategories'           => array(
														'Jan', 
														'Feb', 
														'Mar', 
														'Apr', 
														'May', 
														'Jun',
														'Jul', 
														'Aug', 
														'Sep', 
														'Oct', 
														'Nov', 
														'Dec'													
									              ),	
					'creditsEnabled'			=> FALSE
				) 
			);
				
	    $this->HighCharts->setChartParams
			(
				$chartNameTwo,
				array
				(
					'renderTo'					=> 'columnwrapper',  // div to display chart inside
					'chartWidth'				=> 800,
					'chartHeight'				=> 600,					
					'title'						=> 'Monthly Sales Summary - Column',			
					'yAxisTitleText' 			=> 'Y Axis Title Text',
					'xAxisCategories'           => array(
														'Jan', 
														'Feb', 
														'Mar', 
														'Apr', 
														'May', 
														'Jun',
														'Jul', 
														'Aug', 
														'Sep', 
														'Oct', 
														'Nov', 
														'Dec'													
									              ),	
					'creditsText'  	 			=> 'Example.com',
					'creditsURL'				=> 'http://example.com'
				) 
			);
			
		$this->HighCharts->setChartParams
			(
				$chartNameThree,
				array
				(
					'renderTo'					=> 'piewrapper',  // div to display chart inside
					'chartWidth'				=> 800,
					'chartHeight'				=> 600,					
					'title'						=> 'Browser Usage Statistics',					
					'creditsText'  	 			=> 'Example.com',
					'creditsURL'				=> 'http://example.com'
				) 
			);
		
        $seriesOne = $this->HighCharts->addChartSeries();
		$seriesTwo = $this->HighCharts->addChartSeries();
		$seriesThree = $this->HighCharts->addChartSeries();
		
		$seriesOne->addName('Tokyo')->addData($chartData1);
		$seriesTwo->addName('London')->addData($chartData2);
		$seriesThree->addName('London')->addData($chartData3);
						
		$mychartOne->addSeries($seriesOne);
		$mychartTwo->addSeries($seriesTwo);
		$mychartThree->addSeries($seriesThree);

	}

	public function column()
	{ 
		$this->LoadModel('Browser');	
		$chartData = $this->Browser->find('all', array('fields' => array('Browser.name', 'Browser.amount')));
		
		//debug($chartData);
		
		$chartData = $this->HighCharts->_reformArray($chartData,'Browser');
		
		//$chartData =   Set::classicExtract($chartData,'{0}.Browser');
	              
		
		debug($chartData);

				
		$chartName = 'Column Chart';
		
		$mychart = $this->HighCharts->create
										 (
											$chartName,
											array
											(
												'type' => 'pie',
												'exporting' => TRUE
											)
										 );

	
	   $this->HighCharts->setChartParams
			(
				$chartName,
				array
				(
					'renderTo'					=> 'columnwrapper',  // div to display chart inside
					'chartWidth'				=> 800,
					'chartHeight'				=> 600,
					'chartMarginTop' 			=> 60,
					'chartMarginLeft'			=> 90,
					'chartMarginRight'			=> 30,
					'chartMarginBottom'			=> 110,
					'chartSpacingRight'			=> 10,
					'chartSpacingBottom'		=> 15,
					'chartSpacingLeft'			=> 0,
					'chartAlignTicks'			=> FALSE,					
					//'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
					//'chartBackgroundColorStops'	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
					
					'title'						=> 'Monthly Sales Summary',
					'titleAlign'				=> 'left',
					'titleFloating'				=> TRUE,
					'titleStyleFont'			=> '18px Metrophobic, Arial, sans-serif',
					'titleStyleColor'			=> '#0099ff',
					'titleX'					=> 20,
					'titleY'					=> 20,
					
					'legendEnabled' 			=> TRUE,
					'legendLayout'				=> 'horizontal',
					'legendAlign'				=> 'center',
					'legendVerticalAlign '		=> 'bottom',
					'legendItemStyle'			=> array('color' => '#222'),
					'legendBackgroundColorLinearGradient' => array(0,0,0,25),
					'legendBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),

                    'tooltipEnabled' 			=> FALSE,
                   // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                   // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    
					//'plotOptionsLinePointStart' => strtotime('-30 day') * 1000,
					//'plotOptionsLinePointInterval' => 24 * 3600 * 1000,					
					
					//'xAxisType' 				=> 'datetime',
					//'xAxisTickInterval' 		=> 10,
					//'xAxisStartOnTick' 			=> TRUE,
					//'xAxisTickmarkPlacement' 	=> 'on',
					//'xAxisTickLength' 			=> 10,
					//'xAxisMinorTickLength' 		=> 5,
					
					'xAxisLabelsEnabled' 		=> TRUE,
					'xAxisLabelsAlign' 			=> 'right',
					'xAxisLabelsStep' 			=> 2,
					'xAxisLabelsRotation' 		=> -35,
					'xAxislabelsX' 				=> 5,
					'xAxisLabelsY' 				=> 20,					
					
					//'yAxisMin' 					=> 0,
					//'yAxisMaxPadding'			=> 0.2,
					//'yAxisEndOnTick'			=> FALSE,
					//'yAxisMinorGridLineWidth' 	=> 0,
					//'yAxisMinorTickInterval' 	=> 'auto',
					//'yAxisMinorTickLength' 		=> 1,
					//'yAxisTickLength'			=> 2,
					//'yAxisMinorTickWidth'		=> 1,
					
					
					'yAxisTitleText' 			=> 'Units',
					//'yAxisTitleAlign' 			=> 'high',
					//'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
					//'yAxisTitleRotation' 		=> 0,
					//'yAxisTitleX' 				=> 0,
					//'yAxisTitleY' 				=> -10,
					//'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
					
					// autostep options
					'enableAutoStep' => FALSE							
				) 
			);
		
        $series1 = $this->HighCharts->addChartSeries();
		
		$series1->addName('Browser Distribution')->addData($chartData);		
						
		$mychart->addSeries($series1);
		
	}

}
