<?php
/**
 *  CakePHP Highcharts Plugin
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
?>
<table>
        <thead>
                <tr>
                        <th>Single-Series Demo</th>
                        <th>Multi-Series Demo</th>
                        <th>Stacked Demo</th>
                        <th>Minimalist Demo (With Themes)</th>
                        <th>Other Demo</th>
                        <th>Combination Demo</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Area', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'area')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Area', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'area')); ?></td>
                        <td class="stacked"><?php echo $this->Html->link('Column', array('plugin' => 'highcharts', 'controller' => 'stacked_demo', 'action' => 'column')); ?></td>
                        <td class="minimal"><?php echo $this->Html->link('Column (Skies)', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'column')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Mixed Charts (One Page)', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'mixed_charts')); ?></td>
                        <td class="combo"><?php echo $this->Html->link('Column,Line & Pie', array('plugin' => 'highcharts', 'controller' => 'combination_demo', 'action' => 'combo')); ?></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Area Spline', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'areaspline')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Area Spline', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'areaspline')); ?></td>
                        <td class="stacked"><?php echo $this->Html->link('Grouped Column', array('plugin' => 'highcharts', 'controller' => 'stacked_demo', 'action' => 'grouped_column')); ?></td>
                        <td class="minimal"><?php echo $this->Html->link('Pie (Gray)', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'pie')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Spline with Live Data', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'spline_live')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Bar', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'bar')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Bar', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'bar')); ?></td>
                        <td class="stacked"><?php echo $this->Html->link('Bar', array('plugin' => 'highcharts', 'controller' => 'stacked_demo', 'action' => 'bar')); ?></td>
                        <td class="minimal"><?php echo $this->Html->link('Column with Rotated Label (Grid)', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'column_rotated')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Column with Drilldown', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'column_drilldown')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Column', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'column')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Column', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'column')); ?></td>
                        <td class="stacked"><?php echo $this->Html->link('Percentage Column', array('plugin' => 'highcharts', 'controller' => 'stacked_demo', 'action' => 'percent_column')); ?></td>
                        <td class="minimal"><?php echo $this->Html->link('Spline with Crosshairs (Dark-blue)', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'spline_cross')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Column 3D', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'column3d')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Line', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'line')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Line', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'line')); ?></td>
                        <td class="stacked"></td>
                        <td class="minimal"><?php echo $this->Html->link('Line with Data Labels (Dark-green)', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'line')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Pie 3D', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'pie3d')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Pie', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'pie')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Pie', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'pie')); ?></td>
                        <td class="stacked"></td>
                        <td class="minimal"><?php echo $this->Html->link('Semicircle Donut', array('plugin' => 'highcharts', 'controller' => 'minimalist_demo', 'action' => 'semicircle_donut')); ?></td>
                        <td class="other"><?php echo $this->Html->link('Donut 3D', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'donut3d')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Pie w/ drill down', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'pie_drill_down')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Scatter', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'scatter')); ?></td>
                        <td class="stacked"></td>
                        <td class="minimal"></td>
                        <td class="other"><?php echo $this->Html->link('Angular Gauge', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'angular_gauge')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Scatter', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'scatter')); ?></td>
                        <td class="multi"><?php echo $this->Html->link('Spline', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'scatter')); ?></td>
                        <td class="stacked"></td>
                        <td class="minimal"></td>
                        <td class="other"><?php echo $this->Html->link('Funnel', array('plugin' => 'highcharts', 'controller' => 'mixed_charts_demo', 'action' => 'funnel')); ?></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Spline', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'spline')); ?></td>
                         <td class="multi"><?php echo $this->Html->link('Bubble', array('plugin' => 'highcharts', 'controller' => 'multi_series_demo', 'action' => 'bubble')); ?></td>
                        <td class="stacked"></td>
                        <td class="minimal"></td>
                        <td class="other"></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                        <td class="single"><?php echo $this->Html->link('Donut', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'donut')); ?></td>
                        <td class="multi"></td>
                        <td class="stacked"></td>
                        <td class="minimal"></td>
                        <td class="other"></td>
                        <td class="combo"></td>
                </tr>
                <tr>
                    <td class="single"><?php echo $this->Html->link('Columnrange', array('plugin' => 'highcharts', 'controller' => 'single_series_demo', 'action' => 'columnrange')); ?></td>
                    <td class="multi"></td>
                        <td class="stacked"></td>
                        <td class="minimal"></td>
                        <td class="other"></td>
                        <td class="combo"></td>
                </tr>
        </tbody>
</table>

<p>
        Get the code on Github
        now at <?php echo $this->Html->link('CakePHP Highcharts Plugin', 'https://github.com/destinydriven/cakephp-highcharts-plugin'); ?>
</p>
