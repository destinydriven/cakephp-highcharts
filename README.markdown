# Highcharts Plugin for CakePHP 2.* #

Thank you for trying out Highcharts plugin for CakePHP 2.*!

Please note that this plugin is still a work-in-progress, with only the basic
functionality to reproduce the charts available through the Highcharts library.
More features will be added and the existing ones will be improved as you discover better ways of doing things and send me pull requests.

Please send your comments and suggestions to d3stinydriv3n[at]gmail.com

For those of you who simply want take a quick look at this plugin's features,  demos are available at:

<http://destinydrivenlive.com/highcharts/high_charts/high_charts_demo>

## Usage ##

Deploy the plugin in your `app/Plugin/HighCharts` directory. If you're using
Git, run this while in your app folder:

	git init
	git submodule add git://github.com/destinydriven/cakephp-high-charts-plugin.git Plugin/HighCharts
	git submodule init
	git submodule update

Or visit <http://github.com/destinydriven/cakephp-high-charts-plugin>
and download the plugin manually to your `app/Plugin/HighCharts/` folder.

Since CakePHP 2.0 it is necessary to activate the plugin in your application. To do so,
edit `app/Config/bootstrap.php` and add the line `CakePlugin::load('HighCharts');` at the
bottom. If you already have `CakePlugin::loadAll();` then you may skip this step.

You're done. Check the demo charts included in the plugin to see how to generate
individual chart types. Open the demos in your browser:

	[your app root]/high_charts/high_charts_demo

Be sure to first check out the Minimalist Demo for tips on how to quickly set up Highcharts Plugin in your own projects.
The Minimalist Demos also demonstrate theme usage where you can add predefined customizations to your charts by simply
specifying the key:

        'chartTheme' => 'dark-blue'  // other options are 'skies', 'grid', 'gray', 'dark-green'

in your $params array on your setChartParams() call.

The other examples provide tons of customization options which you may not want to bother with initially.

Implementing Highcharts to your app would simply include adding the Highcharts component to your controller. (See examples for more details)

	public $components = array('HighCharts.HighCharts');

Through the inclusion of the component, the HighCharts helper is automatically made available to your views.

## Special Dependency Note ##

This plugin depends on jQuery (<http://jquery.com>) so you would need to ensure that it is loaded in your layout or the
view in which you want to display your charts. An example of how to load jQuery in your layout is available in:

	HighCharts/View/Layouts/chart.demo.ctp

	<?php
		...

		echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'));

		...

		echo $this->fetch('script');
	?>

Of course, you may also use a copy of the jQuery library from your app/webroot/js folder like this:

	<?php
		...

		echo $this->Html->script(array('jquery.min'));

		...

		echo $this->fetch('script');
	?>

**Important**

This plugin is NOT compatible with CakePHP 1.3.* versions.

This plugin has been tested with CakePHP 2.3.2 and so far works without issue.


## Contributing ##

If you would like to contribute, clone the source on GitHub, make your changes and send me a pull request.
If you are unable to fix the issue, create a ticket and we'll see what happens from there.

## Credits ##

Obviously, this plugin is using Highcharts Free, freely available for non-commercial use from
<http://www.highcharts.com/>

This plugin also utilizes HighRoller (an object-oriented PHP wrapper for Highcharts)
<http://www.highroller.io/>
HighRoller is also available on Github and is licenced under  the Apache 2.0 license.
<https://github.com/jmaclabs/HighRoller>

# Special Thanks To: #

* Lecterror (<https://github.com/lecterror>) for providing the inspiration to create this plugin
* Jigzstar <https://github.com/jigzstar> for introducing me to Highcharts.
* Tigrang <https://github.com/tigrang> for assistance in improving Highcharts helper


## Additional Resources ##
It might be instructive to take a look at the HighRoller README file (Plugin Vendor's Folder) to get a better idea of how it all works
Additionally, if you are looking to extend this plugin, a good place to start would be the Highcharts API Reference
<http://www.api.highcharts.com/highcharts/>

## Licence ##

Multi-licensed under:

* MPL <http://www.mozilla.org/MPL/MPL-1.1.html>
* LGPL <http://www.gnu.org/licenses/lgpl.html>
* GPL <http://www.gnu.org/licenses/gpl.html>
* Apache License, Version 2.0 <http://www.apache.org/licenses/LICENSE-2.0.html>

