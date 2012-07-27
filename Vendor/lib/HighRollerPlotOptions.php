<?php
/**
 * Author: jmac
 * Date: 9/23/11
 * Time: 12:38 PM
 * Desc: HighRoller Plot Options
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
 
class HighRollerPlotOptions {

  public $series;

  function __construct($chartType){
    $this->series = new HighRollerSeriesOptions();
    if($chartType == 'area'){ $this->area = null; }
    else if($chartType == 'bar'){ $this->bar = null; }
    else if($chartType == 'column'){ $this->column = null; }
    else if($chartType == 'line'){ $this->line = null; }
    else if($chartType == 'pie'){ $this->pie = null; }
    else if($chartType == 'scatter'){ $this->scatter = null; }
    else if($chartType == 'spline'){ $this->spline = null; }
  }

}
?>