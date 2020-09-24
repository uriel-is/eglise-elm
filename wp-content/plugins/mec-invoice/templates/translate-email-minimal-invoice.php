<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'E-mail' => __('E-mail', 'mec-invoice'),
	'Address' => __('Address', 'mec-invoice'),
	'Phone' => __('Phone', 'mec-invoice'),
	'Vat Number' => __('Vat Number', 'mec-invoice'),
];
?>