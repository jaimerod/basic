<?php
/**
 * Sample module adds wizard to the title
 * @param  string $title The page title
 * @return string        The modified string
 */
function wizard_header_title($title) {
	return '<|:{) - ' . $title;
}

Hook::applyFilter('render_placeholder_title', 'wizard_header_title');