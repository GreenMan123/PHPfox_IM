<?php

namespace Core;
/*
new Event('lib_phpfox_template_getfooter__', function(\Phpfox_Template $object) {
	$friend = new \Api\Friend();
	$im = [
		'client_id' => PHPFOX_LICENSE_ID,
		'user' => user(),
		'friends' => $friend->get()
	];
	$object->footer .= '<div id="vieber-im"></div>';
	$object->footer .= '<script>var Vieber_IM = ' . json_encode($im) . ';</script>';
});
*/
new Route('/im', function(Controller $controller) {
	$path = __DIR__ . '/assets/boot.css';
	$friend = new \Api\Friend();
	$im = [
		'client_id' => PHPFOX_LICENSE_ID,
		'user' => user(),
		'friends' => $friend->get()
	];

	echo '<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
	<head>
		<title></title>
		<style>
		' . file_get_contents($path) . '
		</style>
	</head>
	<body>';
	echo '<iframe src="' . $controller->url->make('blog') . '" style="position:fixed; left:0px; top:0px; bottom:0px; right:250px; border:0px; height:100%; width:85%;"></iframe>';
	echo '<div id="vieber-im"></div>';
	echo '<script>var Vieber_IM = ' . json_encode($im) . ';</script>';
	echo '<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';
	echo '<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.6/socket.io.min.js"></script>';
	echo '<script>';
	echo file_get_contents(__DIR__ . '/assets/boot.js');
	echo '</script>';
	echo '</body></html>';
});