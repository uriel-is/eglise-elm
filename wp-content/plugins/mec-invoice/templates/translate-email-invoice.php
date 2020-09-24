<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Download PDF' => __('Download PDF', 'mec-invoice'),
	'Print' => __('Print', 'mec-invoice'),
	'E-mail' => __('E-mail', 'mec-invoice'),
	'Address' => __('Address', 'mec-invoice'),
	'Phone' => __('Phone', 'mec-invoice'),
	'Vat Number' => __('Vat Number', 'mec-invoice'),
	'Website' => __('Website', 'mec-invoice'),
	'Event Name' => __('Event Name', 'mec-invoice'),
	'Event Excerpt' => __('Event Excerpt', 'mec-invoice'),
	'Event Date' => __('Event Date', 'mec-invoice'),
	'Event Time' => __('Event Time', 'mec-invoice'),
	'Invoice Date' => __('Invoice Date', 'mec-invoice'),
	'Event Location' => __('Event Location', 'mec-invoice'),
	'Invoice Number' => __('Invoice Number', 'mec-invoice'),
	'Transaction ID' => __('Transaction ID', 'mec-invoice'),
	'Organizer' => __('Organizer', 'mec-invoice'),
	'Name' => __('Name', 'mec-invoice'),
	'Website' => __('Website', 'mec-invoice'),
	'Email' => __('Email', 'mec-invoice'),
	'Phone' => __('Phone', 'mec-invoice'),
	'Description' => __('Description', 'mec-invoice'),
	'Rate' => __('Rate', 'mec-invoice'),
	'Qty' => __('Qty', 'mec-invoice'),
	'Amount' => __('Amount', 'mec-invoice'),
	'Tax\Fee' => __('Tax\Fee', 'mec-invoice'),
	'Discount' => __('Discount', 'mec-invoice'),
	'Total Due' => __('Total Due', 'mec-invoice'),
	'Attendees' => __('Attendees', 'mec-invoice'),
];
?>