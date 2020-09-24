<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'DATE' => __('DATE', 'mec-invoice'),
	'TIME' => __('TIME', 'mec-invoice'),
	'PRICE' => __('PRICE', 'mec-invoice'),
	'Ticket Holder' => __('Ticket Holder', 'mec-invoice'),
	'Organized by' => __('Organized by', 'mec-invoice'),
	'Vat Number' => __('Vat Number', 'mec-invoice'),
];
?>