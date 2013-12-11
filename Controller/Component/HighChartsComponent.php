<?php
/**
 *  CakePHP HighCharts Plugin
 *
 *  Copyright (C) 2012 Kurn La Montagne / destinydriven
 *  <https://github.com/destinydriven>
 *
 *  Multi-licensed under:
 *      MPL <http://www.mozilla.org/MPL/MPL-1.1.html>
 *      LGPL <http://www.gnu.org/licenses/lgpl.html>
 *      GPL <http://www.gnu.org/licenses/gpl.html>
 *      Apache License, Version 2.0 <http://www.apache.org/licenses/LICENSE-2.0.html>
 */
App::import('Vendor', 'HighCharts.HighRoller', true, array(), 'lib/HighRoller.php');

App::import('Vendor', 'HighCharts.HighRollerChart', true, array(), 'lib/HighRollerChart.php');

App::import('Vendor', 'HighCharts.HighRollerTitle', true, array(), 'lib/HighRollerTitle.php');

App::import('Vendor', 'HighCharts.HighRollerSeries', true, array(), 'lib/HighRollerSeries.php');

App::import('Vendor', 'HighCharts.HighRollerStyle', true, array(), 'lib/HighRollerStyle.php');

App::import('Vendor', 'HighCharts.HighRollerFormatter', true, array(), 'lib/HighRollerFormatter.php');

App::import('Vendor', 'HighCharts.HighRollerOptions', true, array(), 'lib/HighRollerOptions.php');

App::import('Vendor', 'HighCharts.HighRollerPlotOptions', TRUE, array(), 'lib/HighRollerPlotOptions.php');

App::import('Vendor', 'HighCharts.HighRollerPlotOptionsByChartType', TRUE, array(), 'lib/HighRollerPlotOptionsByChartType.php');

App::import('Vendor', 'HighCharts.HighRollerOptionsGlobal', true, array(), 'lib/HighRollerOptionsGlobal.php');

App::import('Vendor', 'HighCharts.HighRollerSeriesData', true, array(), 'HighRollerSeriesData.php');

App::import('Vendor', 'HighCharts.HighRollerDataLabels', TRUE, array(), 'lib/HighRollerDataLabels.php');

App::import('Vendor', 'HighCharts.HighRollerSeriesOptions', TRUE, array(), 'lib/HighRollerSeriesOptions.php');

App::import('Vendor', 'HighCharts.HighRollerPlotOptions', TRUE, array(), 'lib/HighRollerPlotOptions.php'); 

App::import('Vendor', 'HighCharts.HighRollerToolTip', TRUE, array(), 'lib/HighRollerToolTip.php');

class HighChartsComponent extends Component {

    public $components = array('Session');

    public $controller;
    public $defaultSettings = array('title' => 'HighCharts Sample Title');
    public $settings = array();
    public $charts = array();

    public $highroller = NULL;


    /**
     * Constructor
     *
     * @param ComponentCollection $collection A ComponentCollection this component can use to lazy load its components
     * @param array $settings Array of configuration settings
     */
    public function __construct(ComponentCollection $collection, $settings = array()) {
        parent::__construct($collection, $settings);
    $this->controller = $collection->getController();
    $this->settings = $settings;
    $this->highroller = New HighRoller();
    $this->title = new HighRollerTitle();
    }

    public function initialize(Controller $controller) {
        if (!isset($this->controller->helpers['HighCharts.HighCharts'])) {
            $this->controller->helpers[] = 'HighCharts.HighCharts';
        }
    $_settings = $this->defaultSettings;

    if (is_array($this->settings)) {
            $_settings = array_merge($_settings, $this->settings);
    }
    $this->settings = $_settings;
    }


    public function beforeRender(Controller $controller) {
        CakeSession::write('HighChartsPlugin.Charts', $this->charts);
    }

    /**
     * Creates a chart and associates it with a key "$name".
     *
     * @param string $name Name to identify your chart
     * @param string $type Type of chart (options are 'area','areaspline','bar', 'column', 'line', 'pie', 'scatter' or 'spline').
     * @return object HighRoller chart object of specified type .
     */
    public function create($name, $type) {
        if (!isset($type)) {
            $this->log(sprintf(__('Please provide a type for chart %s!', true), $name));
            return false;
        }
        switch ($type) {
            case 'area':
                    App::import('Vendor', 'HighCharts.HighRollerAreaChart', true, array(), 'HighRollerAreaChart.php');
                    $this->$name = new HighRollerAreaChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'areaspline':
                    App::import('Vendor', 'HighCharts.HighRollerAreasplineChart', true, array(), 'HighRollerAreaSplineChart.php');
                    $this->$name = new HighRollerAreaSplineChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'bar':
                    App::import('Vendor', 'HighCharts.HighRollerBarChart', true, array(), 'HighRollerBarChart.php');
                    $this->$name = new HighRollerBarChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'column':
                    App::import('Vendor', 'HighCharts.HighRollerColumnChart', true, array(), 'HighRollerColumnChart.php');
                    $this->$name = new HighRollerColumnChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'line':
                    App::import('Vendor', 'HighCharts.HighRollerLineChart', true, array(), 'HighRollerLineChart.php');
                    $this->$name = new HighRollerLineChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'pie':
                    App::import('Vendor', 'HighCharts.HighRollerPieChart', true, array(), 'HighRollerPieChart.php');
                    $this->$name = new HighRollerPieChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'scatter':
                    App::import('Vendor', 'HighCharts.HighRollerScatterChart', true, array(), 'HighRollerScatterChart.php');
                    $this->$name = new HighRollerScatterChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            case 'spline':
                    App::import('Vendor', 'HighCharts.HighRollerSplineChart', true, array(), 'HighRollerSplineChart.php');
                    $this->$name = new HighRollerSplineChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
            default:
                    App::import('Vendor', 'HighCharts.HighRollerColumnChart', true, array(), 'HighRollerColumnChart.php');
                    $this->$name = new HighRollerColumnChart();
                    $this->charts[$name] =& $this->$name;
                    return $this->$name;
                break;
        }
    }

    /**
     * Sets chart parameters.
     *
     * @param string $name Chart name.
     * @param array $params A [large] array of chart options.
     */
    public function setChartParams($name, $params = array()) {
        
        if (empty($params)) {
            return;
        }
        
            	// credits options
    	if (isset($params['credits'])) {
    		$this->charts[$name]->credits = $params['credits'];
    	}
        
        //lang options 
        if(isset($params['langOptionsEnabled']) && $params['langOptionsEnabled'] == true) {  
            
            $this->charts[$name]->lang = new HighRollerOptionsGlobal();
            
            if (isset($params['langThousandsSep'])) {
                // this appears to have no effect here 
                $this->charts[$name]->lang->thousandsSep = $params['langThousandsSep'];
            }
            if (isset($params['langLoading'])) {
                $this->charts[$name]->lang->loading = $params['langLoading'];
            }
            if (isset($params['langWeekdays'])) {
                $this->charts[$name]->lang->weekdays = $params['langWeekdays'];
            }
            if (isset($params['langMonths'])) {
                $this->charts[$name]->lang->months = $params['langMonths'];
            }
            if (isset($params['langShortMonths'])) {
                $this->charts[$name]->lang->shortMonths = $params['langShortMonths'];
            }
            if (isset($params['langExportButtonTitle'])) {
                $this->charts[$name]->lang->exportButtonTitle = $params['langExportButtonTitle'];
            }
            if (isset($params['langPrintButtonTitle'])) {
                $this->charts[$name]->lang->printButtonTitle = $params['langPrintButtonTitle'];
            }
        }
        
        // chart options
        if (isset($params['renderTo'])) {
            $this->charts[$name]->chart->renderTo = $params['renderTo'];
        }
        if (isset($params['reflow'])) {
            $this->charts[$name]->chart->reflow = $params['reflow'];
        }
        if (isset($params['chartColors'])) {
            $this->charts[$name]->chart->colors = $params['chartColors'];
        }
        if (isset($params['chartWidth'])) {
            $this->charts[$name]->chart->width = $params['chartWidth'];
        }
        if (isset($params['chartHeight'])) {
            $this->charts[$name]->chart->height = $params['chartHeight'];
        }
        if (isset($params['chartMargin']) && is_array($params['chartMargin'])) {
            $this->charts[$name]->chart->margin = $params['chartMargin'];
        }
        if (isset($params['chartMarginTop'])) {
            $this->charts[$name]->chart->marginTop = $params['chartMarginTop'];
        }
        if (isset($params['chartMarginLeft'])) {
            $this->charts[$name]->chart->marginLeft= $params['chartMarginLeft'];
        }
        if (isset($params['chartMarginRight'])) {
            $this->charts[$name]->chart->marginRight = $params['chartMarginRight'];
        }
        if (isset($params['chartMarginBottom'])) {
            $this->charts[$name]->chart->marginBottom = $params['chartMarginBottom'];
        }
        if (isset($params['chartSpacingRight'])) {
            $this->charts[$name]->chart->spacingRight = $params['chartSpacingRight'];
        }
        if (isset($params['chartSpacingBottom'])) {
            $this->charts[$name]->chart->spacingBottom = $params['chartSpacingBottom'];
        }
        if (isset($params['chartSpacingLeft'])) {
            $this->charts[$name]->chart->spacingLeft = $params['chartSpacingLeft'];
        }
        if (isset($params['chartAlignTicks'])) {
            $this->charts[$name]->chart->alignTicks = $params['chartAlignTicks'];
        }
        if (isset($params['chartBorderColor'])) {
            $this->charts[$name]->chart->borderColor = $params['chartBorderColor'];
        }
        if (isset($params['chartBorderWidth'])) {
            $this->charts[$name]->chart->borderWidth = $params['chartBorderWidth'];
        }
        if (isset($params['chartBackgroundColorLinearGradient'])) {            
            $this->charts[$name]->chart->backgroundColor = new stdClass();
            $this->charts[$name]->chart->backgroundColor->linearGradient = $params['chartBackgroundColorLinearGradient'];
        }
        if (isset($params['chartBackgroundColorStops'])) {
            $this->charts[$name]->chart->backgroundColor->stops = $params['chartBackgroundColorStops'];
        }
        if (isset($params['chartEventsLoad'])) {
            $this->charts[$name]->chart->events = new stdClass();
            $this->charts[$name]->chart->events->load = $params['chartEventsLoad'];
        }
        if (isset($params['chartEventsClick'])) {
            $this->charts[$name]->chart->events->click = $params['chartEventsClick'];
        }
        if (isset($params['chartBackgroundColor'])) {
            $this->charts[$name]->chart->backgroundColor = $params['chartBackgroundColor'];
            if (isset($params['chartShadow'])) {
                $this->charts[$name]->chart->shadow = $params['chartShadow'];
            }
        }
        if (isset($params['chartPlotBackgroundColor'])) {
            $this->charts[$name]->chart->plotBackgroundColor = $params['chartPlotBackgroundColor'];
            if (isset($params['chartPlotShadow'])) {
                $this->charts[$name]->chart->plotShadow = $params['chartPlotShadow'];
            }
        }
        if (isset($params['chartPlotBackgroundImage'])) {
            $this->charts[$name]->chart->plotBackgroundImage = $params['chartPlotBackgroundImage'];
        }
        if (isset($params['chartPlotBorderColor'])) {
            $this->charts[$name]->chart->plotBorderColor = $params['chartPlotBorderColor'];
        }
        if (isset($params['chartPlotBorderWidth'])) {
            $this->charts[$name]->chart->plotBorderWidth = $params['chartPlotBorderWidth'];
        }
        if (isset($params['chartTheme'])) {
            $this->charts[$name]->chart->className = $params['chartTheme'];
        }

        // title options
        if (isset($params['title'])) {
            $this->charts[$name]->title->text = $params['title'];
        }
        if (isset($params['subtitle'])) {
            $this->charts[$name]->subtitle = new stdClass();
            $this->charts[$name]->subtitle->text = $params['subtitle'];
        }
        if (isset($params['titleAlign'])) {
            $this->charts[$name]->title->align = $params['titleAlign'];
        }
        if (isset($params['titleFloating'])) {
            $this->charts[$name]->title->floating = $params['titleFloating'];
        }
        if (isset($params['titleStyleFont'])) {
            $this->charts[$name]->title->style = new stdClass();
            $this->charts[$name]->title->style->font = $params['titleStyleFont'];
        }
        if (isset($params['titleStyleColor'])) {
            $this->charts[$name]->title->style->color = $params['titleStyleColor'];
        }
        if (isset($params['titleX'])) {
            $this->charts[$name]->title->x = $params['titleX'];
        }
        if (isset($params['titleY'])) {
            $this->charts[$name]->title->y = $params['titleY'];
        }

        // legend options
        if (isset($params['legendEnabled'])) {
            $this->charts[$name]->legend = new stdClass();
            $this->charts[$name]->legend->enabled = $params['legendEnabled'];
        }
        if (isset($params['legendLayout'])) {
            $this->charts[$name]->legend->layout = $params['legendLayout'];
        }
        if (isset($params['legendAlign'])) {
            $this->charts[$name]->legend->align = $params['legendAlign'];
        }
        if (isset($params['legendVerticalAlign'])) {
            $this->charts[$name]->legend->verticalAlign = $params['legendVerticalAlign'];
        }
        if (isset($params['legendItemStyle'])) {
            $this->charts[$name]->legend->itemStyle = $params['legendItemStyle'];
        }
        if (isset($params['legendBackgroundColorLinearGradient'])) {
            $this->charts[$name]->legend->backgroundColor = new stdClass();
            $this->charts[$name]->legend->backgroundColor->linearGradient = $params['legendBackgroundColorLinearGradient'];
        }
        if (isset($params['legendBackgroundColorStops'])) {
            $this->charts[$name]->legend->backgroundColor->stops = $params['legendBackgroundColorStops'];
        }
        if (isset($params['legendBackgroundColor'])) {
            $this->charts[$name]->legend->backgroundColor = $params['legendBackgroundColor'];
        }
        if (isset($params['legendMargin'])) {
            $this->charts[$name]->legend->margin = $params['legendMargin'];
        }
        if (isset($params['legendItemMarginTop'])) {
            $this->charts[$name]->legend->itemMarginTop = $params['legendItemMarginTop'];
        }
        if (isset($params['legendItemMarginBottom'])) {
            $this->charts[$name]->legend->itemMarginBottom = $params['legendItemMarginBottom'];
        }
        if (isset($params['legendWidth'])) {
            $this->charts[$name]->legend->width = $params['legendWidth'];
        }
        if (isset($params['legendItemWidth'])) {
            $this->charts[$name]->legend->item->width = $params['legendItemWidth'];
        }
        if (isset($params['legendItemWidth'])) {
            $this->charts[$name]->legend->itemWidth = $params['legendItemWidth'];
        }
        if (isset($params['legendItemStyleWidth'])) {
            $this->charts[$name]->legend->itemStyle->width = $params['legendItemStyleWidth'];
        }

        // tooltip options
        if (isset($params['tooltipEnabled']) &&  $params['tooltipEnabled'] === TRUE) {
            if (isset($params['tooltipBackgroundColorLinearGradient'])) {
                $this->charts[$name]->tooltip = new HighRollerToolTip(); // TOOLTIP FORMATTER
                $this->charts[$name]->tooltip->backgroundColor = new stdClass();
                $this->charts[$name]->tooltip->backgroundColor->linearGradient = $params['tooltipBackgroundColorLinearGradient'];
            }
            if (isset($params['tooltipBackgroundColorStops'])) {
                $this->charts[$name]->tooltip->backgroundColor->stops = $params['tooltipBackgroundColorStops'];
            }
            if (isset($params['tooltipFormatter'])) {
                $this->charts[$name]->tooltip->formatter = $params['tooltipFormatter'];
            }
            if (isset($params['tooltipCrosshairs'])) {
                $this->charts[$name]->tooltip->crosshairs = $params['tooltipCrosshairs'];
            }
            if (isset($params['tooltipShared'])) {
                $this->charts[$name]->tooltip->shared = $params['tooltipShared'];
            }
        }

        // plotOptions settings
        if (isset($params['plotOptionsLinePointStart'])) {
            $this->charts[$name]->plotOptions->line->pointStart = $params['plotOptionsLinePointStart'];
        }
        if (isset($params['plotOptionsLinePointInterval'])) {
            $this->charts[$name]->plotOptions->line->pointInterval = $params['plotOptionsLinePointInterval'];
        }
        if (isset($params['plotOptionsColumnCursor'])) {
            $this->charts[$name]->plotOptions = new HighRollerPlotOptions($this->charts[$name]->chart->type); 
            $this->charts[$name]->plotOptions->column = new stdClass(); 
            $this->charts[$name]->plotOptions->column->cursor = $params['plotOptionsColumnCursor'];
        }
        if (isset($params['plotOptionsColumnPointEventsClick'])) {
            $this->charts[$name]->plotOptions = new HighRollerPlotOptions($this->charts[$name]->chart->type);
            $this->charts[$name]->plotOptions->column = new stdClass(); 
            $this->charts[$name]->plotOptions->column->point = new stdClass();
            $this->charts[$name]->chart->events = new stdClass();
            $this->charts[$name]->plotOptions->column->point->events = $this->charts[$name]->chart->events;
            $this->charts[$name]->plotOptions->column->point->events->click = new stdClass();
            $this->charts[$name]->plotOptions->column->point->events->click = $params['plotOptionsColumnPointEventsClick'];
        }
        if (isset($params['plotOptionsColumnDataLabelsEnabled'])) {
            $this->charts[$name]->plotOptions = new stdClass();
            $this->charts[$name]->plotOptions->column = new HighRollerPlotOptionsByChartType($this->charts[$name]->chart->type);
            $this->charts[$name]->plotOptions->column->dataLabels->enabled = $params['plotOptionsColumnDataLabelsEnabled'];
        }
        if (isset($params['plotOptionsColumnDataLabelsColor'])) {
            $this->charts[$name]->plotOptions->column->dataLabels->color = $params['plotOptionsColumnDataLabelsColor'];
        }
        if (isset($params['plotOptionsColumnDataLabelsFormatter'])) {
            $this->charts[$name]->plotOptions->column->dataLabels->formatter = $params['plotOptionsColumnDataLabelsFormatter'];
        }
        if (isset($params['plotOptionsColumnDataLabelsStyle'])) {
            $this->charts[$name]->plotOptions->column->dataLabels->style = $params['plotOptionsColumnDataLabelsStyle'];
        }
        if (isset($params['plotOptionsSeriesStacking'])) {
            $this->charts[$name]->plotOptions = new stdClass(); 
            $this->charts[$name]->plotOptions->series = new HighRollerPlotOptions($this->charts[$name]->chart->type);                        
            $this->charts[$name]->plotOptions->series->stacking = $params['plotOptionsSeriesStacking'];
        }
        if (isset($params['plotOptionsShowInLegend'])) {           
            $this->charts[$name]->plotOptions = new stdClass(); 
            $this->charts[$name]->plotOptions->series = new HighRollerPlotOptions($this->charts[$name]->chart->type);  
            $this->charts[$name]->plotOptions->series->showInLegend = $params['plotOptionsShowInLegend'];
        }
        if (isset($params['plotOptionsFillColor'])) {            
            $this->charts[$name]->plotOptions = new HighRollerPlotOptions($this->charts[$name]->chart->type);             
            $this->charts[$name]->plotOptions->area = new stdClass();
            $this->charts[$name]->plotOptions->area->fillColor = $params['plotOptionsFillColor'];
        }
        if (isset($params['plotOptionsLineDataLabelsEnabled'])) {
            $this->charts[$name]->plotOptions = new HighRollerPlotOptions($this->charts[$name]->chart->type); 
            $this->charts[$name]->plotOptions->line = new HighRollerPlotOptions($this->charts[$name]->chart->type); 
            $this->charts[$name]->plotOptions->line->dataLabels = new HighRollerDataLabels();
            $this->charts[$name]->plotOptions->line->dataLabels->enabled = $params['plotOptionsLineDataLabelsEnabled'];
        }
        if (isset($params['plotOptionsLineDataLabelsFormatter'])) {
            $this->charts[$name]->plotOptions->line->dataLabels->formatter = $params['plotOptionsColumnDataLabelsFormatter'];
        }        
        if (isset($params['plotOptionsLineEnableMouseTracking'])) {
            $this->charts[$name]->plotOptions->line->enableMouseTracking = $params['plotOptionsLineEnableMouseTracking'];
        }
		if (isset($params['plotOptionsPieDataLabelsEnabled'])) {
            $this->charts[$name]->plotOptions = new stdClass();
            $this->charts[$name]->plotOptions->pie = new HighRollerPlotOptionsByChartType($this->charts[$name]->chart->type);
            $this->charts[$name]->plotOptions->pie->dataLabels->enabled = $params['plotOptionsPieDataLabelsEnabled'];
        }
		if (isset($params['plotOptionsPieShowInLegend'])) {           
            $this->charts[$name]->plotOptions = new stdClass(); 
            $this->charts[$name]->plotOptions->pie = new HighRollerPlotOptionsByChartType($this->charts[$name]->chart->type);  
            $this->charts[$name]->plotOptions->pie->showInLegend = $params['plotOptionsPieShowInLegend'];
        }

        // X axis options
        $this->charts[$name]->xAxis = new stdClass();
        if (isset($params['xAxisDateTimeLabelFormats'])) {           
            $this->charts[$name]->xAxis->dateTimeLabelFormats = $params['xAxisDateTimeLabelFormats'];
        }
        
        if (isset($params['xAxisCategories'])) {
            $this->charts[$name]->xAxis->categories = $params['xAxisCategories'];
        }
        if (isset($params['xAxisType'])) {
            $this->charts[$name]->xAxis->type = $params['xAxisType'];
        }
        if (isset($params['xAxisTickInterval'])) {
            $this->charts[$name]->xAxis->tickInterval = $params['xAxisTickInterval'];
        }
        if (isset($params['xAxisTickPixelInterval'])) {
            $this->charts[$name]->xAxis->tickPixelInterval = $params['xAxisTickPixelInterval'];
        }
        if (isset($params['xAxisStartOnTick'])) {
            $this->charts[$name]->xAxis->startOnTick = $params['xAxisStartOnTick'];
        }
        if (isset($params['xAxisTickmarkPlacement'])) {
            $this->charts[$name]->xAxis->tickmarkPlacement = $params['xAxisTickmarkPlacement'];
        }
        if (isset($params['xAxisTickLength'])) {
            $this->charts[$name]->xAxis->tickLength = $params['xAxisTickLength'];
        }
        if (isset($params['xAxisMinorTickLength'])) {
            $this->charts[$name]->xAxis->minorTickLength = $params['xAxisMinorTickLength'];
        }
        if (isset($params['xAxisLabelsEnabled']) &&  $params['xAxisLabelsEnabled'] === TRUE) {
            $this->charts[$name]->labels = new stdClass();
            $this->charts[$name]->dataLabels = new stdClass();
            $this->charts[$name]->labels->formatter = new HighRollerFormatter(); // LABELS FORMATTER
            $this->charts[$name]->dataLabels->formatter = new HighRollerFormatter(); // LABELS FORMATTER

            if (isset($params['xAxisLabelsAlign'])) {
                $this->charts[$name]->xAxis->labels = new stdClass();
                $this->charts[$name]->xAxis->labels->align = $params['xAxisLabelsAlign'];
            }
            if (isset($params['xAxisLabelsStep'])) {
                $this->charts[$name]->xAxis->labels->step = $params['xAxisLabelsStep'];
            }
            if (isset($params['xAxisLabelsRotation'])) {
                $this->charts[$name]->xAxis->labels->rotation = $params['xAxisLabelsRotation'];
            }
            if (isset($params['xAxislabelsX'])) {
                $this->charts[$name]->xAxis->labels->x = $params['xAxislabelsX'];
            }
            if (isset($params['xAxisLabelsY'])) {
                $this->charts[$name]->xAxis->labels->y = $params['xAxisLabelsY'];
            }
        }

        // Y axis options
        if (isset($params['yAxisMin'])) {
            $this->charts[$name]->yAxis->min = $params['yAxisMin'];
        }
        if (isset($params['yAxisMaxPadding'])) {
            $this->charts[$name]->yAxis->maxPadding  = $params['yAxisMaxPadding'];
        }
        if (isset($params['yAxisEndOnTick'])) {
            $this->charts[$name]->yAxis->endOnTick = $params['yAxisEndOnTick'];
        }
        if (isset($params['yAxisMinorGridLineWidth'])) {
            $this->charts[$name]->yAxis->minorGridLineWidth  = $params['yAxisMinorGridLineWidth'];
        }
        if (isset($params['yAxisTickInterval'])) {
            $this->charts[$name]->yAxis->tickInterval = $params['yAxisTickInterval'];
        }
        if (isset($params['yAxisMinTickInterval'])) {
            $this->charts[$name]->yAxis->minTickInterval = $params['yAxisMinTickInterval'];
        }    
        if (isset($params['yAxisMinorTickInterval'])) {
            $this->charts[$name]->yAxis->minorTickInterval  = $params['yAxisMinorTickInterval'];
        }
        if (isset($params['yAxisMinorTickLength'])) {
            $this->charts[$name]->yAxis->minorTickLength  = $params['yAxisMinorTickLength'];
        }
        if (isset($params['yAxisTickLength'])) {
            $this->charts[$name]->yAxis->tickLength  = $params['yAxisTickLength'];
        }
        if (isset($params['yAxisMinorTickWidth'])) {
            $this->charts[$name]->yAxis->minorTickWidth  = $params['yAxisMinorTickWidth'];
        }
        if (isset($params['yAxisPlotLines'])) {
            $this->charts[$name]->yAxis = new stdClass();
            $this->charts[$name]->yAxis->plotLines  = $params['yAxisPlotLines'];
        }

        // Y axis title options
        if (isset($params['yAxisTitleText'])) {
            App::import('Vendor', 'HighCharts.HighRollerStyle', TRUE, array(), 'lib/HighRollerStyle.php');
            App::import('Vendor', 'HighCharts.HighRollerAxisTitle', TRUE, array(), 'lib/HighRollerAxisTitle.php');
            if(!isset($this->charts[$name]->yAxis)) {
		$this->charts[$name]->yAxis = new HighRollerAxisTitle();
  	    }
            $this->charts[$name]->yAxis->title = new stdClass();
            $this->charts[$name]->yAxis->title->text = $params['yAxisTitleText'];
        }
        if (isset($params['yAxisTitleAlign'])) {
            $this->charts[$name]->yAxis->title->align  = $params['yAxisTitleAlign'];
        }
        if (isset($params['yAxisTitleStyleFont'])) {
            $this->charts[$name]->yAxis->title->style->font = $params['yAxisTitleStyleFont'];
        }
        if (isset($params['yAxisTitleRotation'])) {
            $this->charts[$name]->yAxis->title->rotation  = $params['yAxisTitleRotation'];
        }
        if (isset($params['yAxisTitleX'])) {
            $this->charts[$name]->yAxis->title->x  = $params['yAxisTitleX'];
        }
        if (isset($params['yAxisTitleY'])) {
            $this->charts[$name]->yAxis->title->y  = $params['yAxisTitleY'];
        }

        // Autostep settings
        if (isset($params['enableAutoStep']) && $params['enableAutoStep'] === TRUE ) {
            $this->charts[$name]->enableAutoStep();
        }

        // Credits settings
        if (isset($params['creditsEnabled']) && $params['creditsEnabled'] === FALSE ) {
            $this->charts[$name]->credits = new stdClass();
            $this->charts[$name]->credits->enabled = FALSE;
        }
        else {
            if(isset($params['creditsText'])) {
                $this->charts[$name]->credits = new stdClass();
                $this->charts[$name]->credits->text = $params['creditsText'];
            }
            if(isset($params['creditsURL'])) {
                $this->charts[$name]->credits->href = $params['creditsURL'];
            }
        }

        // exporting options
        if(isset($params['exportingEnabled']) && $params['exportingEnabled'] === TRUE) {
            $this->charts[$name]->exporting = new stdClass();
            $this->charts[$name]->exporting->enabled = TRUE;            
        }
    }


    /**
     * Add chart data.
     * Wrapper for HighRoller addData()
     * @param array $data An array of values.
     */
    public function addChartData($data) {
        if (isset($data)) {
            $this->highroller->addData($data);
        }
    }


    /** create a series for your chart
     *
     * @return HighRollerSeriesData object
     */
    public function addChartSeries() {
        return new HighRollerSeriesData();
     }

}
?>
