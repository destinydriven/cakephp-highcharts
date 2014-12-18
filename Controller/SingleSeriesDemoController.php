<?php

/**
 *  CakePHP Highcharts Plugin
 *
 * @property HighchartsComponent $Highcharts
 *
 *    Copyright (C) 2014 Kurn La Montagne / destinydriven
 *    <https://github.com/destinydriven>
 *
 *    Multi-licensed under:
 *        MPL <http://www.mozilla.org/MPL/MPL-1.1.html>
 *        LGPL <http://www.gnu.org/licenses/lgpl.html>
 *        GPL <http://www.gnu.org/licenses/gpl.html>
 *        Apache License, Version 2.0 <http://www.apache.org/licenses/LICENSE-2.0.html>
 */
class SingleSeriesDemoController extends HighchartsAppController {

        public $name = 'SingleSeriesDemo';
        public $components = array('Highcharts.Highcharts');
        public $helpers = array('Html');
        public $uses = array();
        public $layout = 'Highcharts.chart.demo';
        public $chartData = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
        public $Highcharts = null;

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
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    'plotOptionsFillColor' => array(
                        'linearGradient' => array(0, 0, 0, 300),
                        'stops' => array(
                            array(0, 'rgba(112, 138, 255, 1.0)'), // Highcharts.getOptions().colors[0]
                            array(1, 'rgba(2,0,0,0)')
                        )
                    ),
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 2,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
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
                    // autostep options
                    'enableAutoStep' => FALSE,
                    // credits setting  [Highcharts.com  displayed on chart]
                    'creditsEnabled' => FALSE,
                    'creditsText' => 'Example.com',
                    'creditsURL' => 'http://example.com'
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
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
                    // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
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
                    'xAxisLabelsStep' => 2,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Y Axis Title Text',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
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
                    // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
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
                    'xAxislabelsX' => -10,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units',
                    //'yAxisTitleAlign' 		=> 'high',
                    //'yAxisTitleStyleFont' 	=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 		=> 0,
                    //'yAxisTitleX' 		=> 0,
                    //'yAxisTitleY' 		=> -10,
                    //'yAxisPlotLines' 		=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
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
                    // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
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
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
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
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 			=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 	=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'		=> 1,
                    'yAxisTitleText' => 'Units',
                    //'yAxisTitleAlign' 		=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 		=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
                $this->set(compact('chartName'));
        }

        public function donut() {
                
                $dataJson = '[{"name":"MSIE","y":55.11,"color":"#7cb5ec"},{"name":"Firefox","y":21.63,"color":"#434348"},{"name":"Chrome","y":11.94,"color":"#90ed7d"},{"name":"Safari","y":7.15,"color":"#f7a35c"},{"name":"Opera","y":2.14,"color":"#8085e9"}]';
                $drillJson = '[{"name":"MSIE 6.0","y":10.85,"color":"rgba(175,232,255,1)"},{"name":"MSIE 7.0","y":7.35,"color":"rgba(162,219,255,1)"},{"name":"MSIE 8.0","y":33.06,"color":"rgba(149,206,255,1)"},{"name":"MSIE 9.0","y":2.81,"color":"rgba(136,193,248,1)"},{"name":"Firefox 2.0","y":0.2,"color":"rgba(118,118,123,1)"},{"name":"Firefox 3.0","y":0.83,"color":"rgba(107,107,112,1)"},{"name":"Firefox 3.5","y":1.58,"color":"rgba(97,97,102,1)"},{"name":"Firefox 3.6","y":13.12,"color":"rgba(87,87,92,1)"},{"name":"Firefox 4.0","y":5.43,"color":"rgba(77,77,82,1)"},{"name":"Chrome 5.0","y":0.12,"color":"rgba(195,255,176,1)"},{"name":"Chrome 6.0","y":0.19,"color":"rgba(188,255,169,1)"},{"name":"Chrome 7.0","y":0.12,"color":"rgba(182,255,163,1)"},{"name":"Chrome 8.0","y":0.36,"color":"rgba(175,255,156,1)"},{"name":"Chrome 9.0","y":0.32,"color":"rgba(169,255,150,1)"},{"name":"Chrome 10.0","y":9.91,"color":"rgba(163,255,144,1)"},{"name":"Chrome 11.0","y":0.5,"color":"rgba(156,249,137,1)"},{"name":"Chrome 12.0","y":0.22,"color":"rgba(150,243,131,1)"},{"name":"Safari 5.0","y":4.55,"color":"rgba(255,214,143,1)"},{"name":"Safari 4.0","y":1.42,"color":"rgba(255,206,135,1)"},{"name":"Safari Win 5.0","y":0.23,"color":"rgba(255,199,128,1)"},{"name":"Safari 4.1","y":0.21,"color":"rgba(255,192,121,1)"},{"name":"Safari/Maxthon","y":0.2,"color":"rgba(255,184,113,1)"},{"name":"Safari 3.1","y":0.19,"color":"rgba(255,177,106,1)"},{"name":"Safari 4.1","y":0.14,"color":"rgba(254,170,99,1)"},{"name":"Opera 9.x","y":0.12,"color":"rgba(179,184,255,1)"},{"name":"Opera 10.x","y":0.37,"color":"rgba(162,167,255,1)"},{"name":"Opera 11.x","y":1.65,"color":"rgba(145,150,250,1)"}]';

                $chartName = 'Donut Chart';

                $pieChart = $this->Highcharts->create($chartName, 'pie');

                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'donutwrapper', // div to display chart inside
                    'chartWidth' => 1024,
                    'chartHeight' => 768,
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
                    'tooltipEnabled' => TRUE,
                    'tooltipBackgroundColorLinearGradient' => array(0, 0, 0, 50), // triggers js error
                    'tooltipBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Browsers')
                        ->addData(json_decode($dataJson, true))
                        ->addSize('50%');

                $pieChart->addSeries($series);

                $seriesOuter = $this->Highcharts->addChartSeries();
                $seriesOuter->addName('Versions')
                        ->addData(json_decode($drillJson))
                        ->addSize('70%')
                        ->addInnerSize('50%');
                
                $pieChart->addSeries($seriesOuter);

                $this->set(compact('chartName'));
        }

        public function pie_drill_down() {

                $renderTo = 'pie_drill_down';

                $colors = array('#4572A7', '#AA4643', '#89A54E', '#80699B', '#3D96AE');  // custom list of colours
                
                $chartData = array(
                    array(
                        'y' => 55.11,
                        'color' => $colors[0],
                        'name' => 'Internet Explorer',
                        'drilldown' => 'msie'
                    ),
                    array(
                        'y' => 21.63,
                        'color' => $colors[1],
                        'name' => 'Mozilla Firefox',
                        'drilldown' => 'firefox'
                    ),
                    array(
                        'y' => 11.94,
                        'name' => 'Google Chrome',
                        'color' => $colors[2],
                        'drilldown' => 'chrome'
                    ),
                    array(
                        'y' => 7.15,
                        'name' => 'Safari',
                        'color' => $colors[3],
                        'drilldown' => 'safari'
                    ),
                    array(
                        'y' => 2.14,
                        'name' => 'Opera',
                        'color' => $colors[4],
                        'drilldown' => 'opera'
                    )
                );

                $drillDownData = array(
                    array(
                        'name' => 'MSIE Versions',
                        'id' => 'msie',
                        'data' => array(
                            array('MSIE 6.0', 10.85),
                            array('MSIE 7.0', 7.35),
                            array('MSIE 8.0', 33.06),
                            array('MSIE 9.0', 2.81),
                        )
                    ),
                    array(
                        'name' => 'Firefox Versions',
                        'id' => 'firefox',
                        'data' => array(
                            array('Firefox 2.0', 0.20),
                            array('Firefox 3.0', 0.83),
                            array('Firefox 3.5', 1.58),
                            array('Firefox 3.6', 13.12),
                            array('Firefox 4.0', 5.43),
                        )
                    ),
                    array(
                        'name' => 'Chrome Versions',
                        'id' => 'chrome',
                        'data' => array(
                            array('Chrome 5.0', 0.12),
                            array('Chrome 6.0', 0.19),
                            array('Chrome 7.0', 0.12),
                            array('Chrome 8.0', 0.36),
                            array('Chrome 9.0', 0.32,),
                            array('Chrome 10.0', 9.91),
                            array('Chrome 11.0', 0.50),
                            array('Chrome 12.0', 0.22),
                        )
                    ),
                    array(
                        'name' => 'Safari Versions',
                        'id' => 'safari',
                        'data' => array(
                            array('Safari 5.0', 4.55),
                            array('Safari 4.0', 1.42),
                            array('Safari Win 5.0', 0.23),
                            array('Safari 4.1', 0.21),
                            array('Safari-Maxthon', 0.20),
                            array('Safari 3.1', 0.19),
                            array('Safari 4.1', 0.14),
                        )
                    ),
                    array(
                        'name' => 'Opera Versions',
                        'id' => 'opera',
                        'data' => array(
                            array('Opera 9.x', 0.12),
                            array('Opera 10.x', 0.37),
                            array('Opera 11.x', 1.65),
                        )
                    )
                );

                $chartName = 'Pie Chart';

                $pieChart = $this->Highcharts->create($chartName, 'pie');

                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'piewrapper', // div to display chart inside
                    'chartWidth' => 1024,
                    'chartHeight' => 768,
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
                    'tooltipEnabled' => TRUE,
                    'tooltipBackgroundColorLinearGradient' => array(0, 0, 0, 50), // triggers js error
                    'tooltipBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Brands')
                        ->addData($chartData);

                $pieChart->addSeries($series);

                $pieChart->addDrillDownData($drillDownData);

                $this->set(compact('chartName'));
        }

        public function pie() {
                
                $pieData = array(
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
                    'chartWidth' => 1024,
                    'chartHeight' => 768,
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
                    'tooltipEnabled' => TRUE,
                    'tooltipBackgroundColorLinearGradient' => array(0, 0, 0, 50), // triggers js error
                    'tooltipBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Browser Share')
                        ->addData($pieData);

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
                    //'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                    //'chartBackgroundColorStops'	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
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
                    // 'xAxisLabelsRotation' 			=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 	=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'		=> 1,
                    'yAxisTitleText' => 'Y Axis Title Text',
                    //'yAxisTitleAlign' 		=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 		=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series1);
                
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
                    // 'tooltipBackgroundColorLinearGradient' => array(0,0,0,50),   // triggers js error
                    // 'tooltipBackgroundColorStops' => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 	=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 			=> 'datetime',
                    //'xAxisTickInterval' 		=> 10,
                    //'xAxisStartOnTick' 		=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 		=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 2,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    //'yAxisMin' 			=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 	=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'             => 1,
                    'yAxisTitleText' => 'Units',
                    //'yAxisTitleAlign' 		=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 		=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),
                    // autostep options
                    'enableAutoStep' => FALSE
                        )
                );

                $series = $this->Highcharts->addChartSeries();

                $series->addName('Tokyo')
                        ->addData($this->chartData);

                $mychart->addSeries($series);
                
                $this->set(compact('chartName'));
        }

}
