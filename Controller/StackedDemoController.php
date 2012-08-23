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
class StackedDemoController extends HighChartsAppController {
    public $name = 'StackedDemo';
    public $components = array('HighCharts.HighCharts');
    public $uses = array();
    public $layout = 'chart.demo';

    public $johnData = array( 5,3,4,7,2 );
    public $janeData = array( 2,2,3,2,1 );
    public $joeData  = array( 3,4,4,2,5 );
    public $jillData = array( 3,0,4,4,3 );

    /**
     * HighCharts component
     *
     * @var HighChartsComponent
     */
    public $HighCharts = null;

    public function bar() {
        $chartName = 'Stacked Bar Chart';

        $mychart = $this->HighCharts->create( $chartName, 'bar' );

        $this->HighCharts->setChartParams(
            $chartName,
            array(
                'renderTo'		=> 'barwrapper',  // div to display chart inside
                'chartWidth'		=> 1000,
                'chartHeight'		=> 750,
                'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                'chartBackgroundColorStops'	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                'title'			=> 'Stacked Bar Chart',
                'subtitle'		=> 'Source: World Bank',
                'xAxisLabelsEnabled' 	=> TRUE,
                'xAxisCategories'       	=> array( 'Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas' ),
                'yAxisTitleText' 		=> 'Total Fruit Consumption',
                'enableAutoStep' 		=> FALSE,
                'creditsEnabled'		=> FALSE,
                'plotOptionsSeriesStacking' => 'normal'
            )
    );

        $johnSeries = $this->HighCharts->addChartSeries();
        $janeSeries = $this->HighCharts->addChartSeries();
        $joeSeries  = $this->HighCharts->addChartSeries();

        $johnSeries->addName('John')
            ->addData($this->johnData);
        $janeSeries->addName('Jane')
            ->addData($this->janeData);
        $joeSeries->addName('Joe')
            ->addData($this->joeData);

        $mychart->addSeries($johnSeries);
        $mychart->addSeries($janeSeries);
        $mychart->addSeries($joeSeries);
    }

    public function column() {

        $chartName = 'Stacked Column Chart';

        $mychart = $this->HighCharts->create(
                        $chartName,
                        array(
                            'type' => 'column',
                            'exporting' => TRUE
                        )
                    );


        $this->HighCharts->setChartParams(
                $chartName,
                array(
                    'renderTo'			=> 'columnwrapper',  // div to display chart inside
                    'chartWidth'		=> 1000,
                    'chartHeight'		=> 750,
                    'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                    'chartBackgroundColorStops'	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    'title'			=> 'Stacked Column Chart',
                    'subtitle'			=> 'Source: World Bank',
                    'xAxisLabelsEnabled' 	=> TRUE,
                    'xAxisCategories'       	=> array( 'Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas' ),
                    'yAxisTitleText' 		=> 'Total Fruit Consumption',
                    'enableAutoStep' 		=> FALSE,
                    'creditsEnabled'		=> FALSE,
                    'plotOptionsSeriesStacking' => 'normal' // other options is 'percent'
                )
        );

        $johnSeries = $this->HighCharts->addChartSeries();
        $janeSeries = $this->HighCharts->addChartSeries();
        $joeSeries  = $this->HighCharts->addChartSeries();

        $johnSeries->addName('John')
            ->addData($this->johnData);
        $janeSeries->addName('Jane')
            ->addData($this->janeData);
        $joeSeries->addName('Joe')
            ->addData($this->joeData);

        $mychart->addSeries($johnSeries);
        $mychart->addSeries($janeSeries);
        $mychart->addSeries($joeSeries);
    }

    public function percent_column() {

        $chartName = 'Stacked Percentage Column Chart';

        $mychart = $this->HighCharts->create( $chartName, 'column' );

        $this->HighCharts->setChartParams(
            $chartName,
            array(
                'renderTo'				=> 'columnwrapper',  // div to display chart inside
                'chartWidth'				=> 1000,
                'chartHeight'				=> 750,
                'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                'chartBackgroundColorStops'		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                'title'					=> 'Stacked Percentage Column Chart',
                'subtitle'				=> 'Source: World Bank',
                'xAxisLabelsEnabled' 			=> TRUE,
                'xAxisCategories'       		=> array( 'Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas' ),
                'yAxisTitleText' 			=> 'Total Fruit Consumption',
                'enableAutoStep' 			=> FALSE,
                'creditsEnabled'			=> FALSE,
                'plotOptionsSeriesStacking' 		=> 'percent'
            )
        );

        $johnSeries = $this->HighCharts->addChartSeries();
        $janeSeries = $this->HighCharts->addChartSeries();
        $joeSeries  = $this->HighCharts->addChartSeries();

        $johnSeries->addName('John')
            ->addData($this->johnData);
        $janeSeries->addName('Jane')
            ->addData($this->janeData);
        $joeSeries->addName('Joe')
            ->addData($this->joeData);

        $mychart->addSeries($johnSeries);
        $mychart->addSeries($janeSeries);
        $mychart->addSeries($joeSeries);
    }

    public function grouped_column() {
        $chartName = 'Stacked Grouped Column Chart';

        $mychart = $this->HighCharts->create( $chartName, 'column' );

        $this->HighCharts->setChartParams(
            $chartName,
            array(
                'renderTo'			=> 'columnwrapper',  // div to display chart inside
                'chartWidth'			=> 1000,
                'chartHeight'			=> 750,
                'chartBackgroundColorLinearGradient' 	=> array(0,0,0,300),
                'chartBackgroundColorStops'		=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                'title'					=> 'Total fruit consumtion, grouped by gender',
                'subtitle'				=> 'Source: World Bank',
                'xAxisLabelsEnabled' 		=> TRUE,
                'xAxisCategories'       	=> array( 'Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas' ),
                'yAxisTitleText' 		=> 'Number of Fruits',
                'enableAutoStep' 		=> FALSE,
                'creditsEnabled'		=> FALSE,
                'plotOptionsSeriesStacking' 	=> 'normal'
            )
        );

        $johnSeries = $this->HighCharts->addChartSeries();
        $janeSeries = $this->HighCharts->addChartSeries();
        $joeSeries  = $this->HighCharts->addChartSeries();
        $jillSeries = $this->HighCharts->addChartSeries();

        $johnSeries->addName('John')
            ->addData($this->johnData)
            ->stack = 'male';

        $janeSeries->addName('Jane')
            ->addData($this->janeData)
            ->stack = 'female';

        $joeSeries->addName('Joe')
            ->addData($this->joeData)
            ->stack = 'male';

        $jillSeries->addName('Jill')
            ->addData($this->jillData)
            ->stack = 'female';

        $mychart->addSeries($johnSeries);
        $mychart->addSeries($janeSeries);
        $mychart->addSeries($joeSeries);
        $mychart->addSeries($jillSeries);
    }

}
