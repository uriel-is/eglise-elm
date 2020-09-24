<?php
// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

return [
	'Permission Denied' => __('Permission Denied', 'mec-invoice'),
	'OoO!' => __('OoO!', 'mec-invoice'),
	'Bad Situation' => __('Bad Situation', 'mec-invoice'),
	'Invoice Data is Missed!' => __('Invoice Data is Missed!', 'mec-invoice'),
];
?>