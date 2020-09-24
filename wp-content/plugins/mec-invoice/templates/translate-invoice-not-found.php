<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Permission Denied' => __('Permission Denied', 'mec-invoice'),
	'It`s wrong way!' => __('It`s wrong way!', 'mec-invoice'),
	'You_Know?' => __('You_Know?', 'mec-invoice'),
	'Invoice not found!' => __('Invoice not found!', 'mec-invoice'),
];
?>