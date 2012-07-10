
The widget.tpl template is used to format the output of the widget as is seen by the outside world.

There are 4 primary built-in placeholders which are are dictated by the template in use.

[+before_widget+]
[+after_widget+]
[+before_title+]
[+after_title+]

There are also placeholders corresponding to the ContentRotatorWidget::$control_options array keys. 
The value of these are bound to an instance of the widget, so two instances of the same widget may have completely different values.
These placeholders include:

[+seconds_shelf_life+]
[+title+]

Lastly the most important placeholder:

[+content+]

contains the random text as defined in the plugin's administration page

There are additional placeholders created from the widget() functions $args array, for example

Array
(
	[name]					=> Primary Widget Area
	[id]						=> Primary Widget Area
	[description]		=> Primary Widget Area
	[before_widget] => <li id="contentrortatorwidget-1" class="widget_container ContentRotatorWidget"> ( where -1 is the instance number )
	[after_widget]	=>	</li>
	[before_title]	=>	<h3 class="wodget_title">
	[after_title]		=>	</h3>
	[widget_id]			=>	contentrotatorwidget-1 ( where -1 is the instance number )
	[widget_name]		=>	Content Rotator
)

Each key in this array corresponds to a placeholder. 
For example [+name+] and [+id+] are placehoders you can use in your widget tpl file.

The documentation for the available placeholders occurs in this readme.txt file so that it does not display publicly 