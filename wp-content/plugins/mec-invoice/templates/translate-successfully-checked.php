<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Checked Successfully' => __('Checked Successfully', 'mec-invoice'),
	'Invoice ID' => __('Invoice ID', 'mec-invoice'),
	'Successfully Checked!' => __('Successfully Checked!', 'mec-invoice'),
	'Event Name' => __('Event Name', 'mec-invoice'),
	'Name' => __('Name', 'mec-invoice'),
	'Email' => __('Email', 'mec-invoice'),
	'Checked Time' => __('Checked Time', 'mec-invoice'),
];
?>