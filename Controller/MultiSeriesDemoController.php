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
class MultiSeriesDemoController extends HighchartsAppController {

        public $name = 'MultiSeriesDemo';
        public $components = array('Highcharts.Highcharts');
        public $helpers = array('Html');
        public $uses = array();
        public $layout = 'Hightcharts.chart.demo';
        public $Highcharts = null;
        public $chartData1 = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
        public $chartData2 = array(0.2, 0.9, 5.5, 11.5, 17.2, 22.5, 24.2, 21.5, 23.3, 14.3, 18.9, 2.6);
        public $chartData3 = array(0.9, 0.6, 3.5, 8.5, 13.2, 17.5, 18.2, 17.5, 14.3, 12.3, 8.9, 5.6);

        public function area() {
                
                $chartName = 'Area Chart';

                $mychart = $this->Highcharts->create($chartName, 'area');

                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'areawrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 	=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval'=> 24 * 3600 * 1000,
                    //'xAxisType' 			=> 'datetime',
                    //'xAxisTickInterval' 		=> 10,
                    //'xAxisStartOnTick' 		=> TRUE,
                    //'xAxisTickmarkPlacement' 	=> 'on',
                    //'xAxisTickLength' 		=> 10,
                    //'xAxisMinorTickLength' 	=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    'xAxisLabelsRotation' => -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 	        => 0,
                    //'yAxisMaxPadding'		=> 0.2,
                    //'yAxisEndOnTick'		=> FALSE,
                    //'yAxisMinorGridLineWidth' 	=> 0,
                    //'yAxisMinorTickInterval' 	=> 'auto',
                    //'yAxisMinorTickLength' 	=> 1,
                    //'yAxisTickLength'		=> 2,
                    //'yAxisMinorTickWidth'		=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 		=> 'high',
                    //'yAxisTitleStyleFont' 	=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 		=> 0,
                    //'yAxisTitleX' 		=> 0,
                    //'yAxisTitleY' 		=> -10,
                    //'yAxisPlotLines' 		=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE,
                    // credits setting  [Highcharts.com  displayed on chart]
                    'creditsEnabled' => FALSE,
                    'creditsText' => 'Example.com',
                    'creditsURL' => 'http://example.com'
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function areaspline() {
                
                $chartName = 'AreaSpline Chart';

                $mychart = $this->Highcharts->create($chartName, 'areaspline');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'areasplinewrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    //'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                    //'tooltipBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function bar() {

                $chartName = 'Bar Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'bar');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'barwrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    // 'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function column() {
                
                $chartName = 'Column Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'column');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'columnwrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    //'tooltipBackgroundColorLinearGradient'=> array(0,0,0,50),   // triggers js error
                    //'tooltipBackgroundColorStops' 	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')->addData($this->chartData1);
                $series2->addName('London')->addData($this->chartData2);
                $series3->addName('New York')->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function line() {
                
                $chartName = 'Line Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'line');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'linewrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    //'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                    //'tooltipBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' => 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function pie() {
                
                $chartData = array(
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

                $chartName = 'Pie Chart';

                $pieChart = $this->Highcharts->create($chartName, 'pie');

                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'piewrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    //'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                    //'chartBackgroundColorStops'	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    'title' => 'Browser Usage Statistics',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                        //'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                        //'tooltipBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                        )
                );

                $series = $this->Highcharts->addChartSeries();
                $series->addName('Browser Share')
                        ->addData($chartData);
                $pieChart->addSeries($series);
                
                $this->set(compact('chartName'));
        }

        public function scatter() {

                $chartName = 'Scatter Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'scatter');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'scatterwrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    //'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                    //'tooltipBackgroundColorStops'   		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

        public function spline() {
                
                $chartName = 'Spline Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'spline');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'splinewrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    // 'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
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
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' => 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData1);
                $series2->addName('London')
                        ->addData($this->chartData2);
                $series3->addName('New York')
                        ->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }

}
