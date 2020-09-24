<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Permission Denied' => __('Permission Denied', 'mec-invoice'),
	'Invoice ID' => __('Invoice ID', 'mec-invoice'),
	'This is too early for check-in.' => __('This is too early for check-in.', 'mec-invoice'),
	'The event has not started yet. If you are sure about this please contact the website administrator.' => __('The event has not started yet. If you are sure about this please contact the website administrator.', 'mec-invoice'),
];
?>