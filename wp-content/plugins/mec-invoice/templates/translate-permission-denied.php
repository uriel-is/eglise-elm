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
	'Access Denied!' => __('Access Denied!', 'mec-invoice'),
];
?>