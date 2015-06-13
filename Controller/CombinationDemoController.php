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
class CombinationDemoController extends HighchartsAppController {

        public $name = 'CombinationDemo';
        public $components = array('Highcharts.Highcharts');
        public $helpers = array('Highcharts.Highcharts');
        public $uses = array();
        public $layout = 'chart.demo';

        public function combo() {
                
                $janeData = array(3, 2, 1, 3, 4);
                $johnData = array(2, 3, 5, 7, 6);
                $joeData = array(4, 3, 3, 9, 0);
                $avgData = array(3, 2.67, 3, 6.33, 3.33);

                $pieData = array(
                    array(
                        'name' => 'Jane',
                        'y' => 13,
                        'sliced' => true,
                        'selected' => true
                    ),
                    array('John', 23),
                    array('Joe', 19)
                );

                $chartName = 'Combination Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'column');

                $this->Highcharts->setChartParams ($chartName, array(
                    'renderTo' => 'combowrapper', // div to display chart inside
                    'chartWidth' => 1000,
                    'chartHeight' => 750,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Combination Chart',
                    'subtitle' => 'Source: World Bank',
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisCategories' => array('Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'),
                    'yAxisTitleText' => 'Units',
                    'enableAutoStep' => FALSE,
                    'creditsEnabled' => FALSE
                        )
                );

                $janeSeries = $this->Highcharts->addChartSeries();
                $janeSeries->type = 'column';
                $janeSeries->addName('Jane')
                        ->addData($janeData);

                $johnSeries = $this->Highcharts->addChartSeries();
                $johnSeries->type = 'column';
                $johnSeries->addName('John')
                        ->addData($johnData);

                $joeSeries = $this->Highcharts->addChartSeries();
                $joeSeries->type = 'column';
                $joeSeries->addName('Joe')
                        ->addData($joeData);

                $avgSeries = $this->Highcharts->addChartSeries();
                $avgSeries->type = 'spline';
                $avgSeries->addName('Average')
                        ->addData($avgData);

                $pieSeries = $this->Highcharts->addChartSeries();
                $pieSeries->type = 'pie';
                $pieSeries->center = array(200, 150);

                $pieSeries->size = 250;
                $pieSeries->showInLegend = FALSE;
                $pieSeries->addName('Total consumption')->addData($pieData);

                $mychart->addSeries($janeSeries);
                $mychart->addSeries($johnSeries);
                $mychart->addSeries($joeSeries);

                $mychart->addSeries($avgSeries);
                $mychart->addSeries($pieSeries);
                
                $this->set(compact('chartName'));
        }
        
        public function combo_dual_axes() {
                
                $rainfallData = array(49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4);
                $temperatureData = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
                
                $leftYaxis = new stdClass();
                $leftYaxis->labels->style->color = "#89A54E";
                $leftYaxis->title->text = "Temperature";
                $leftYaxis->title->style->color = "#89A54E";              
                
                $rightYaxis = new stdClass();
                $rightYaxis->title->text = "Rainfall";
                $rightYaxis->title->style->color = "#4572A7";
                $rightYaxis->labels->style->color = "#4572A7";
                $rightYaxis->opposite = true;

                $chartName = 'Combo Dual Axes - Spline and Column';
                
                $mychart = $this->Highcharts->create($chartName, 'column');
                
                $mychart->yAxis = array($leftYaxis, $rightYaxis);             
                
                $this->Highcharts->setChartParams ($chartName, array(
                    'renderTo' => 'combowrapper', // div to display chart inside
                    'chartWidth' => 1000,
                    'chartHeight' => 750,
                    'zoomType' => 'xy',
                    'xAxisCategories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                    'tooltipShared' => true,
                    'legendLayout' => 'vertical',
                    'legendAlign' => 'left',
                    'legendX' => 120,
                    'legendVerticalAlign' => 'top',
                    'legendY' => 100,
                    'legendFloating' => true,
                    'legendBackgroundColor' => '#FFFFFF', 
                    'title' => 'Average Monthly Temperature and Rainfall in Tokyo',
                    'subtitle' => 'Source: WorldClimate.com',
                    'enableAutoStep' => TRUE,
                    'creditsEnabled' => FALSE
                        )
                );            
               
                $rainfallSeries = $this->Highcharts->addChartSeries();
                $rainfallSeries->type = 'column';
                $rainfallSeries->tooltip->valueSuffix = ' mm';                
                
                $rainfallSeries->addName('Rainfall')
                        ->addData($rainfallData)
                        ->yAxis = 1; 

                $temperatureSeries = $this->Highcharts->addChartSeries();
                $temperatureSeries->type = 'spline';
                $temperatureSeries->tooltip->valueSuffix = ' °C';
                
                $temperatureSeries->addName('Temperature')
                        ->addData($temperatureData)
                        ->yAxis = 0;

                $mychart->addSeries($rainfallSeries);
                $mychart->addSeries($temperatureSeries); 
                  
                $this->set(compact('chartName'));
        }

}
