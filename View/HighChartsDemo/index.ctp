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
 */
?>
<table>
	<thead>
		<tr>
			<th>Single-Series Demo Charts</th>
			<th>Multi-Series Demo Charts</th>
			<th>Stacked Demo Charts (TO DO)</th>
			<th>Minimalist Demo Chart</th>
			<th>Other Demo Charts</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $this->Html->link('Area', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'area')); ?></td>
			<td><?php echo $this->Html->link('Area', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'area')); ?></td>
			<td><?php //echo $this->Html->link('Pie', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'pie')); ?></td>
			<td><?php echo $this->Html->link('Minimalist Demo', array('plugin' => 'high_charts', 'controller' => 'minimalist_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Mixed Charts (One Page)', array('plugin' => 'high_charts', 'controller' => 'mixed_charts_demo', 'action' => 'mixed_charts')); ?></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Area Spline', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'areaspline')); ?></td>
			<td><?php echo $this->Html->link('Area Spline', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'areaspline')); ?></td>
			<td><?php //echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'column')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'bar')); ?></td>
			<td><?php echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'bar')); ?></td>
			<td><?php //echo $this->Html->link('Bar', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'bar')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'column')); ?></td>
			<td><?php echo $this->Html->link('Column', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'column')); ?></td>
			<td><?php //echo $this->Html->link('Area', array('plugin' => 'high_charts', 'controller' => 'stacked_demo', 'action' => 'area')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Line', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'line')); ?></td>
			<td><?php echo $this->Html->link('Line', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'line')); ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Pie', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'pie')); ?></td>
			<td><?php echo $this->Html->link('Pie', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'pie')); ?></td>
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
		</tr>
		<tr>
			<td><?php echo $this->Html->link('Spline', array('plugin' => 'high_charts', 'controller' => 'single_series_demo', 'action' => 'spline')); ?></td>
			<td><?php echo $this->Html->link('Spline', array('plugin' => 'high_charts', 'controller' => 'multi_series_demo', 'action' => 'spline')); ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
