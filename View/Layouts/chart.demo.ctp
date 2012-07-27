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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('CakePHP HighCharts plugin demos / tests'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('cake.generic'));		
		echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo __('HighCharts Plugin Demos / Tests'); ?></h1>
		</div>
		<div id="content">
			<?php $this->Session->flash(); ?>
			<?php
			
			if ($this->request->params['controller'] != 'high_charts_demo' && $this->request->params['action'] != 'index')
			{
				echo $this->Html->link
					(
						'<< Back to index',
						array
						(
							'plugin'	=> 'high_charts',
							'controller'	=> 'high_charts_demo',
							'action'	=> 'index'
						)
					);
			}
			?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php
			echo $this->Html->link
				(
					$this->Html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework"), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target'=>'_blank', 'escape' => false),
					false
				);
			?>
		</div>
	</div>
</body>
</html>