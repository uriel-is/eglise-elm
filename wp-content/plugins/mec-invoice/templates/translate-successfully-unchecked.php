<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Successfully Unchecked' => __('Successfully Unchecked', 'mec-invoice'),
	'Invoice ID' => __('Invoice ID', 'mec-invoice'),
	'Successfully Unchecked' => __('Successfully Unchecked', 'mec-invoice'),
	'Event Name' => __('Event Name', 'mec-invoice'),
	'Name' => __('Name', 'mec-invoice'),
	'Email' => __('Email', 'mec-invoice'),
];
?>