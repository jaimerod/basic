<?php
require_once('class.css.php');

/**
 * Automatically compresses CSS files when the environment is live
 * @return string The CSS tags to embed in the head
 */
function css_render_placeholder() {
	$args = Hook::addFilter("csscompress_files", array(func_get_args()));

	if (ENV === "LIVE") {
		$c = new CSS();

		$files = "";

		foreach ($args as $file) {
			if (empty($file)) {
				continue;
			}

			if (strlen($files) < 1) {
				$files = $file;
			} else {
				$files .= "&" . $file;
			}
		}

		$files = urlencode($files);
		return "<link rel=\"stylesheet\" type=\"text/css\" href=\"/modules/enabled/css-compress/?css={$files}\">";
	} else {
		foreach ($args as $file) {
			if (empty($file)) {
				continue;
			}
			$buffer .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/{$file}.css\">\n\t";
		}

		return $buffer;
	}
}

Hook::applyFilter('render_placeholder_css', 'css_render_placeholder');