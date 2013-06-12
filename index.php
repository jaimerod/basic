<?php
	require_once('include/sleepy.php');

	$page = new Template('default');
	$page->bind('title', 'Sleepy Mustache');
	$page->bind('header', 'Sleepy Mustache!');
	$page->bind('changelog', json_decode('[
		{
			"title": "Templating upgrade",
			"description": "Added the ability to include other templates inside of a template using <strong>#include</strong>.<br /> Added the ability to pass arrays to a template and iterate through data in the array using <strong>#each</strong>"
		}, {
			"title": "URLClass bugfix",
			"description": "Fixed a typo in the URLClass Module"
		}
	]'));

	$page->show();