<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Already UnChecked' => __('Already UnChecked', 'mec-invoice'),
	'Invoice ID' => __('Invoice ID', 'mec-invoice'),
	'Already UnChecked!' => __('Already UnChecked!', 'mec-invoice'),
	'Event Name' => __('Event Name', 'mec-invoice'),
	'Name' => __('Name', 'mec-invoice'),
	'Email' => __('Email', 'mec-invoice'),
	'Check Ticket' => __('Check Ticket', 'mec-invoice'),
];
?>