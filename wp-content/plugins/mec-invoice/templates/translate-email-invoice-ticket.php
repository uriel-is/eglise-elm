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
];
?>