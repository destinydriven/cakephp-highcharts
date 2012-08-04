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
			<td><?php echo $this->Html->link('Area', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'area')); ?></td>
			<td><?php echo $this->Html->link('Area', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'area')); ?></td>
			<td><?php echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Column (Skies)', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Mixed Charts (One Page)', array('plugin' => 'high_charts', 'controller' => 'mixed_charts_demo', 'action' => 'mixed_charts')); ?></td>
			<td><?php echo $this->Html->link('Column,Line & Pie', array('plugin' => 'high_charts', 'controller' => 'combination_demo', 'action' => 'combo')); ?></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Area Spline', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'areaspline')); ?></td>
			<td><?php echo $this->Html->link('Area Spline', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'areaspline')); ?></td>
			<td><?php echo $this->Html->link('Grouped Column', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'grouped_column')); ?></td>
			<td><?php echo $this->Html->link('Pie (Gray)', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'pie')); ?></td>
			<td><?php echo $this->Html->link('Spline with Live Data', array('plugin' => 'high_charts', 'controller' => 'mixed_charts_demo', 'action' => 'spline_live')); ?></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'bar')); ?></td>
			<td><?php echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'bar')); ?></td>
			<td><?php echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'bar')); ?></td>
			<td><?php echo $this->Html->link('Column with Rotated Label (Grid)', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'column_rotated')); ?></td>
			<td><?php echo $this->Html->link('Column with Drolldown', array('plugin' => 'high_charts', 'controller' => 'mixed_charts_demo', 'action' => 'column_drilldown')); ?></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Percentage Column', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'percent_column')); ?></td>
			<td><?php echo $this->Html->link('Spline with Crosshairs (Dark-blue)', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'spline_cross')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Line', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'line')); ?></td>
			<td><?php echo $this->Html->link('Line', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'line')); ?></td>
			<td></td>
			<td><?php echo $this->Html->link('Line with Data Labels (Dark-green)', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'line')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Pie', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'pie')); ?></td>
			<td><?php echo $this->Html->link('Pie', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'pie')); ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Scatter', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'scatter')); ?></td>
			<td><?php echo $this->Html->link('Scatter', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'scatter')); ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Spline', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'spline')); ?></td>
			<td><?php echo $this->Html->link('Spline', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'spline')); ?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<p>
    Get the code on Github now <?php echo $this->Html->link('CakePHP HighCharts Plugin', 'https://github.com/destinydriven/cakephp-high-charts-plugin'); ?>
          
</p>
