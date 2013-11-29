<?php
return function ($template, $context, $args, $source) {
	$engine = $template->getEngine();
	return '
				<div class="ui four wide column manager rightside form">' .
					($source != '' ? $engine->render($source, $context) : '') . '
				</div>
	        </div>
	    </div>';
};