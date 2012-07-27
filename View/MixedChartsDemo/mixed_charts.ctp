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
<div class="chart">
	
	<div id="linewrapper" style="display: block; float: left; width:90%; margin-bottom: 20px;"></div>
	
	<?php echo $this->HighCharts->render('Line Chart'); ?>	

</div>
<div class="chart">
	
	<div id="columnwrapper" style="display: block; float: left; width:90%; margin-bottom: 20px;"></div>
	
	<?php echo $this->HighCharts->render('Column Chart'); ?>

</div>
<div class="chart">
	
	<div id="piewrapper" style="display: block; float: left; width:90%; margin-bottom: 20px;"></div>
	
	<?php echo $this->HighCharts->render('Pie Chart'); ?>

</div>