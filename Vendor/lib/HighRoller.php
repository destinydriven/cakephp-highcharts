<?php
/**
 * Author: jmaclabs
 * Date: 9/14/11
 * Time: 5:46 PM
 * Desc: HighRoller Parent Class
 *
 * Licensed to Gravity.com under one or more contributor license agreements.
 * See the NOTICE file distributed with this work for additional information
 * regarding copyright ownership.  Gravity.com licenses this file to you use
 * under the Apache License, Version 2.0 (the License); you may not this
 * file except in compliance with the License.  You may obtain a copy of the
 * License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an AS IS BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

class HighRoller {

  public $chart;
  public $title;
//  public $legend;
//  public $tooltip;
//  public $plotOptions;
  public $series = array();

  function __construct(){

    $this->chart = new HighRollerChart();
    $this->title = new HighRollerTitle();
//    $this->legend = new HighRollerLegend();
//    $this->tooltip = new HighRollerToolTip();
//    $this->plotOptions = new HighRollerPlotOptions($this->chart->type);
    $this->series = new HighRollerSeries();

  }

  /** returns a javascript script tag with path to your HighCharts library source
   * @static
   * @param $location - path to your highcharts JS
   * @return string - html script tag markup with your source location
   */
  public static function setHighChartsLocation($location){
    return $scriptTag = "<!-- High Roller - High Charts Location-->
  <script type='text/javascript' src='" . $location . "'></script>";

  }

  /** returns a javascript script tag with path to your HighCharts library THEME source
   * @static
   * @param $location - path to your highcharts theme file
   * @return string - html script tag markup with your source location
   */
  public static function setHighChartsThemeLocation($location){
    return $scriptTag = "<!-- High Roller - High Charts Theme Location-->
  <script type='text/javascript' src='" . $location . "'></script>";

  }

  /** returns chart object with newly set obj property name
   * @param $objName - string, name of the HighRoller Object you're operating on
   * @param $propertyName - string, name of the property you want to set, can be a new property name
   * @param $value - mixed, value you wish to assign to the property
   * @return HighRoller
   */
  public function setProperty($objName, $propertyName, $value){
    $this->$objName->$propertyName = $value;
    return $this;
  }

  /** add data to plot in your chart
   * @param $chartdata - array, data provided in 1 of 3 HighCharts supported array formats (array, assoc array or mult-dimensional array)
   * @return void
   */
  public function addData($chartdata){
    if(!is_array($chartdata)){
      die("HighRoller::addData() - data format must be an array.");
    }
    $this->series = array($chartdata);
  }

  /** add series to your chart
   * @param $chartdata - array, data provided in 1 of 3 HighCharts supported array formats (array, assoc array or mult-dimensional array)
   * @return void
   */
  public function addSeries($chartData){
    if(!is_object($chartData)){
      die("HighRoller::addSeries() - series input format must be an object.");
    }

    if(is_object($this->series)){   // if series is an object
      $this->series = array($chartData);
    } else if(is_array($this->series)) {                        // else
      array_push($this->series, $chartData);
    }
  }

  /** enable auto-step calc for xAxis labels for very large data sets.
   * @return void
   */
  public function enableAutoStep(){

    if(is_array($this->series)) {
      $count = count($this->series[0]->data);
      $step = number_format(sqrt($count));
      if($count > 1000){
        $step = number_format(sqrt($count/$step));
      }

      $this->xAxis->labels->step = $step;
    }

  }

  /** returns new Highcharts javascript
   * @return string - highcharts!
   */
  function renderChart($engine = 'jquery'){
    $options = new HighRollerOptions();   // change file/class name to new HighRollerGlobalOptions()

    if ( $engine == 'mootools')
      $chartJS = 'window.addEvent(\'domready\', function() {';
    else
      $chartJS = '$(document).ready(function() {';

    $chartJS .= "\n\n    // HIGHROLLER - HIGHCHARTS UTC OPTIONS ";

    $chartJS .= "\n    Highcharts.setOptions(\n";
    $chartJS .= "       " . json_encode($options) . "\n";
    $chartJS .= "    );\n";
    $chartJS .= "\n\n    // HIGHROLLER - HIGHCHARTS '" . $this->title->text . "' " . $this->chart->type . " chart";
    $chartJS .= "\n    var " . $this->chart->renderTo . " = new Highcharts.Chart(\n";
    $chartJS .= "       " . $this->getChartOptionsObject() . "\n";
    $chartJS .= "    );\n";
    $chartJS .= "\n  });\n";
    return trim($chartJS);
  }

  /** returns valid Highcharts javascript object containing your HighRoller options, for manipulation between the markup script tags on your page`
   * @return string - highcharts options object!
   */
  function getChartOptionsObject(){
    return trim(json_encode($this));
  }

  /** returns new Highcharts.Chart() using your $varname
   * @param $varname - name of your javascript object holding getChartOptionsObject()
   * @return string - a new Highcharts.Chart() object with the highroller chart options object
   */
  function renderChartOptionsObject($varname){
    return "new Highcharts.Chart(". $varname . ")";
  }

}
?>