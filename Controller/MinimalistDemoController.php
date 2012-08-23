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
class MinimalistDemoController extends HighChartsAppController {
    public $name = 'MinimalistDemo';
    public $components = array('HighCharts.HighCharts');
    public $uses = array();
    public $layout = 'chart.demo';

    public function column() {
        $chartData = array(
                            7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6
                    );

        $chartName = 'Column Chart';

        $mychart = $this->HighCharts->create( $chartName, 'column');

        $this->HighCharts->setChartParams (
                        $chartName,
                        array
                        (
                            'renderTo'                                  => 'columnwrapper',  // div to display chart inside
                            'chartWidth'				=> 1000,
                            'chartHeight'				=> 750,
                            //'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                            //'chartBackgroundColorStops'                 => array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                            'title'					=> 'Monthly Sales Summary',
                            'subtitle'                                  => 'Source: World Bank',
                            'xAxisLabelsEnabled' 			=> TRUE,
                            'xAxisCategories'       	=> array( 'Jan','Feb','Mar','Apr','May','Jun', 'Jul','Aug',	'Sep','Oct','Nov','Dec'),
                            'yAxisTitleText' 		=> 'Units',
                            'enableAutoStep' 		=> FALSE,
                            'creditsEnabled'		=> FALSE,
                            'chartTheme'                => 'skies'
                        )
                );

        $series = $this->HighCharts->addChartSeries();

        $series->addName('Example Online Store')
            ->addData($chartData);

        $mychart->addSeries($series);
    }

    public function column_rotated() {
    $chartData = array(
                        34.4, 21.8, 20.1, 20, 19.6, 19.5, 19.1, 18.4, 18, 17.3, 16.8, 15, 14.7, 14.5, 13.3, 12.8, 12.4, 11.8,11.7, 11.2
                );

    $chartName = 'Column Chart Rotated Labels';

    // anonymous Callback function to format the text of the tooltip
    $tooltipFormatFunction =<<<EOF
function(){ return '<b>'+ this.x +'</b><br/>'+ 'Population in 2008: '+ Highcharts.numberFormat(this.y, 1) +' millions';}
EOF;

    $mychart = $this->HighCharts->create( $chartName, 'column' );


    $this->HighCharts->setChartParams (
        $chartName,
        array(
            'renderTo'                                  => 'columnwrapper',  // div to display chart inside
            'chartWidth'				=> 1000,
            'chartHeight'				=> 750,
            'chartMargin'				=> array( 50, 50, 100, 80),
            'chartTheme'                                => 'grid',

            'title'					=> 'World\'s Largest Cities per 2008',
            'subtitle'                                  => 'Source: World Bank',
            'xAxisLabelsEnabled'    => TRUE,
            'xAxisCategories'       => array(
                                            'Tokyo',
                                            'Jakarta',
                                            'New York',
                                            'Seoul',
                                            'Manila',
                                            'Mumbai',
                                            'Sao Paulo',
                                            'Mexico City',
                                            'Dehli',
                                            'Osaka',
                                            'Cairo',
                                            'Kolkata',
                                            'Los Angeles',
                                            'Shanghai',
                                            'Moscow',
                                            'Beijing',
                                            'Buenos Aires',
                                            'Guangzhou',
                                            'Shenzhen',
                                            'Istanbul'
                                    ),
            'xAxisLabelsRotation' 	=> -45,
            'xAxisLabelsAlign' 		=> 'right',
            'yAxisTitleText' 		=> 'Population (millions)',
            'legendEnabled' 		=> FALSE,
            'enableAutoStep' 		=> FALSE,
            'creditsEnabled'		=> FALSE,
            'tooltipEnabled'		=> TRUE,
            'tooltipFormatter'		=> $tooltipFormatFunction
            )
    );

        $series = $this->HighCharts->addChartSeries();

        $series->addName('Population')
            ->addData($chartData);

        $mychart->addSeries($series);

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

        $pieChart = $this->HighCharts->create( $chartName, 'pie' );

        $this->HighCharts->setChartParams(
                                            $chartName,
                                            array
                                            (
                                                'renderTo'				=> 'piewrapper',  // div to display chart inside
                                                'chartWidth'				=> 1000,
                                                'chartHeight'				=> 750,
                                                'chartTheme'                            => 'gray',
                                                'title'					=> 'Browser Usage Statistics',
                                                'plotOptionsShowInLegend'		=> TRUE,
                                                'creditsEnabled' 			=> FALSE
                                            )
        );

        $series = $this->HighCharts->addChartSeries();

        $series->addName('Browser Share')
            ->addData($chartData);

        $pieChart->addSeries($series);

    }

    public function spline_cross() {
        $chartData1 = array(
                            7.0, 6.9,9.5,14.5,18.2,21.5,25.2,26.5,18.3,13.9,9.6, 7.1
                        );
        $chartData2 = array(
                            3.9,4.2,5.7,8.5,11.9,15.2,17.0,16.6,14.2,10.3,6.6,4.8
                        );

        $chartName = 'Spline Chart with Crosshairs';

        $mychart = $this->HighCharts->create( $chartName, 'spline' );

        $this->HighCharts->setChartParams(
                                            $chartName,
                                            array(
                                                'renderTo'				=> 'splinewrapper',  // div to display chart inside
                                                'chartWidth'				=> 1000,
                                                'chartHeight'				=> 750,
                                                'chartMarginTop' 			=> 60,
                                                'chartMarginLeft'			=> 90,
                                                'chartMarginRight'			=> 30,
                                                'chartMarginBottom'			=> 110,
                                                'chartSpacingRight'			=> 10,
                                                'chartSpacingBottom'			=> 15,
                                                'chartSpacingLeft'			=> 0,
                                                'chartAlignTicks'			=> FALSE,
                                                'chartTheme'                            => 'dark-blue',

                                                'title'					=> 'Monthly Average Temperature',
                                                'subtitle'				=> 'Source: WorldClimate.com',
                                                'titleAlign'				=> 'center',
                                                'titleFloating'				=> TRUE,
                                                'titleStyleFont'			=> '18px Metrophobic, Arial, sans-serif',
                                                'titleStyleColor'			=> '#0099ff',
                                                'titleX'				=> 20,
                                                'titleY'				=> 10,

                                                'legendEnabled' 			=> TRUE,
                                                'legendLayout'				=> 'horizontal',
                                                'legendAlign'				=> 'center',
                                                'legendVerticalAlign '			=> 'bottom',
                                                'legendItemStyle'			=> array('color' => '#222'),
                                                'legendBackgroundColorLinearGradient' 	=> array(0,0,0,25),
                                                'legendBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),

                                                'tooltipEnabled' 			=> TRUE,
                                                'tooltipBackgroundColorLinearGradient' 	=> array(0,0,0,60),
                                                'tooltipBackgroundColorStops' 		=> array(array(0,'#FFFFFF'),array(1,'#E0E0E0')),
                                                'tooltipCrosshairs' 			=> TRUE,
                                                'tooltipShared' 			=> TRUE,

                                                'xAxisLabelsEnabled' 			=> TRUE,
                                                'xAxisLabelsAlign' 			=> 'right',
                                                'xAxisLabelsStep' 			=> 1,
                                                'xAxislabelsX' 				=> 5,
                                                'xAxisLabelsY' 				=> 20,
                                                'xAxisCategories'           		=> array(
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
                                                'yAxisTitleText' 			=> 'Temperature',

                                                /* autostep options */
                                                'enableAutoStep' 			=> FALSE
                                            )
                                    );

        $series1 = $this->HighCharts->addChartSeries();
        $series2 = $this->HighCharts->addChartSeries();

        $series1->addName('Tokyo')
            ->addData($chartData1);
        $series2->addName('London')
            ->addData($chartData2);

        $mychart->addSeries($series1);
        $mychart->addSeries($series2);

    }

    public function line() {
        $chartData1 = array(
                            7.0, 6.9,9.5,14.5,18.2,21.5,25.2,26.5,18.3,13.9,9.6, 7.1
                        );
        $chartData2 = array(
                            3.9,4.2,5.7,8.5,11.9,15.2,17.0,16.6,14.2,10.3,6.6,4.8
                        );

        $chartName = 'Line Chart with Data Labels';

        // anonymous Callback function to format the text of the tooltip
        $tooltipFormatFunction =<<<EOF
function() { return '<b>'+ this.series.name +'</b><br/>'+ this.x +': '+ this.y +'°C';}
EOF;

        $mychart = $this->HighCharts->create( $chartName, 'line' );

        $this->HighCharts->setChartParams(
                        $chartName,
                        array (
                                'renderTo'				=> 'linewrapper',  // div to display chart inside
                                'chartWidth'				=> 1000,
                                'chartHeight'				=> 750,
                                'chartMarginTop' 			=> 60,
                                'chartMarginLeft'			=> 90,
                                'chartMarginRight'			=> 30,
                                'chartMarginBottom'			=> 110,
                                'chartSpacingRight'			=> 10,
                                'chartSpacingBottom'			=> 15,
                                'chartSpacingLeft'			=> 0,
                                'chartAlignTicks'			=> FALSE,
                                'chartTheme'                            => 'dark-green',

                                'title'					=> 'Monthly Average Temperature',
                                'subtitle'				=> 'Source: WorldClimate.com',
                                'titleAlign'				=> 'center',
                                'titleFloating'				=> TRUE,
                                'titleStyleFont'			=> '18px Metrophobic, Arial, sans-serif',
                                'titleStyleColor'			=> '#0099ff',
                                'titleX'				=> 20,
                                'titleY'				=> 10,

                                'legendEnabled' 			=> TRUE,
                                'legendLayout'				=> 'horizontal',
                                'legendAlign'				=> 'center',
                                'legendVerticalAlign '			=> 'bottom',
                                'legendItemStyle'			=> array('color' => '#222'),
                                'legendBackgroundColorLinearGradient' 	=> array(0,0,0,25),
                                'legendBackgroundColorStops' 		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),

                                'tooltipEnabled' 			=> TRUE,
                                'tooltipFormatter'			=> $tooltipFormatFunction,

                                'xAxisLabelsEnabled' 			=> TRUE,
                                'xAxisLabelsAlign' 			=> 'right',
                                'xAxisLabelsStep' 			=> 1,
                                'xAxislabelsX' 				=> 5,
                                'xAxisLabelsY' 				=> 20,
                                'xAxisCategories'           		=> array( 'Jan', 'Feb', 'Mar','Apr', 'May','Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ),

                                'yAxisTitleText' 			=> 'Temperature (°C)',

                                'plotOptionsLineDataLabelsEnabled' 	=> TRUE,
                                'plotOptionsLineEnableMouseTracking' 	=> TRUE,

                                /* autostep options */
                                'enableAutoStep' 			=> FALSE
                        )

            );

        $series1 = $this->HighCharts->addChartSeries();
        $series2 = $this->HighCharts->addChartSeries();

        $series1->addName('Tokyo')
            ->addData($chartData1);

        $series2->addName('London')
            ->addData($chartData2);

        $mychart->addSeries($series1);
        $mychart->addSeries($series2);

	}

}
