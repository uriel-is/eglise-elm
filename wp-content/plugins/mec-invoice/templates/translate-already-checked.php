<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Already Checked' => __('Already Checked', 'mec-invoice'),
	'Invoice ID' => __('Invoice ID', 'mec-invoice'),
	'Already Checked!' => __('Already Checked!', 'mec-invoice'),
	'Event Name' => __('Event Name', 'mec-invoice'),
	'Name' => __('Name', 'mec-invoice'),
	'Email' => __('Email', 'mec-invoice'),
	'Checked Time' => __('Checked Time', 'mec-invoice'),
	'Un-Check Ticket' => __('Un-Check Ticket', 'mec-invoice'),
];
?>