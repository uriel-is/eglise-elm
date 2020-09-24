<?php
/**
 * Plugin Name: MEC Ticket and Invoice
 * Plugin URI: http://webnus.net/modern-events-calendar/
 * Description: You can easily sell your events on your website using the Ticket & Invoice add-on. this add-on allows you to manage your attendees' check-in, send out tickets and invoices in email format. Using this add-on, you can design your own invoice & tickets. The QR codes on the tickets enable you to check-in attendees using the QR code scanner device. Using this tool, you manage your payments on your own website. No need to refer your customers to any other third party websites.
 * Author: Webnus
 * Version: 1.2.0
 * Text Domain: mec-invoice
 * Domain Path: /languages
 * Author URI: http://webnus.net
 **/

namespace MEC_Invoice;

// Don't load directly
if (!defined('ABSPATH')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}
/**
 **   Base.
 **
 **   @author     Webnus <info@webnus.biz>
 **   @package     Modern Events Calendar
 **   @since     1.0.0
 */
class Base
{

	/**
	 **  Instance of this class.
	 **
	 **  @since   1.0.0
	 **  @access  public
	 **  @var     MEC_Invoice
	 */
	public static $instance;

	/**
	 **  Provides access to a single instance of a module using the Singleton pattern.
	 **
	 **  @since   1.0.0
	 **  @return  object
	 */
	public static function instance()
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	public function __construct()
	{
		if (defined('MECINVOICEVERSION')) {
			return;
		}
		self::settingUp();
		self::preLoad();
		self::setHooks($this);

		do_action('MEC_Invoice_init');
	}

	/**
	 **  Global Variables.
	 **
	 **  @since   1.0.0
	 */
	public static function settingUp()
	{
		define('MECINVOICEVERSION', '1.2.0');
		define('MECINVOICEDIR', plugin_dir_path(__FILE__));
		define('MECINVOICEURL', plugin_dir_url(__FILE__));
		define('MECINVOICEASSETS', MECINVOICEURL . 'assets/');
		define('MECINVOICENAME' , 'Ticket and Invoice');
		define('MECINVOICESLUG' , 'mec-invoice');
		define('MECINVOICEOPTIONS' , 'mec_invoice_options');
		define('MECINVOICETEXTDOMAIN' , 'mec-invoice');

		if (!defined('DS')) {
			define('DS', DIRECTORY_SEPARATOR);
		}
	}

	/**
	 **  Set Hooks
	 **
	 **  @since     1.0.0
	 */
	public static function setHooks($This)
	{ }

	/**
	 **  MEC Version Admin Notice
	 **
	 **  @since     1.0.0
	 */
	public function MECVersionAdminNotice($type = false)
	{
		$screen = get_current_screen();
		if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
			return;
		}

		$plugin = 'modern-events-calendar/mec.php';

		if (!current_user_can('install_plugins')) {
			return;
		}

		$install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=modern-events-calendar'), 'install-plugin_' . $plugin);
		$message     = '<p>' . __('MEC Invoice is not working because you need to install latest version of Modern Events Calendar plugin', 'mec-invoice') . '</p>';
		$message    .= esc_html__('Minimum version required') . ': <b> 4.2.3 </b>';
		$message    .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Update Modern Events Calendar Now', 'mec-invoice')) . '</p>';
		?>
		<div class="notice notice-error is-dismissible">
			<p><?php echo $message; ?></p>
		</div>
	<?php

		}

		/**
		 * Plugin Requirements Check
		 *
		 * @since 1.0.0
		 */
		public static function checkPlugins()
		{
			if (!function_exists('is_plugin_active')) {
				include_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			if(!self::$instance) {
				self::$instance = static::instance();
			}

			if (!is_plugin_active('modern-events-calendar/mec.php') && !class_exists('\MEC')) {
				add_action('admin_notices', [self::$instance, 'MECNotice']);
				return false;
			} else {
				if (!defined('MEC_VERSION')) {
					$plugin_data = get_plugin_data(realpath(WP_PLUGIN_DIR . '/modern-events-calendar/mec.php'));
					$version     = str_replace('.', '', $plugin_data['Version']);
				} else {
					$version = str_replace('.', '', MEC_VERSION);
				}
				if ($version <= 421) {
					add_action('admin_notices', [self::$instance, 'MECVersionAdminNotice'], 'version');
					return false;
				}
			}

			return true;
		}

		/**
		 ** Send Admin Notice (MEC)
		 **
		 ** @since 1.0.0
		 **/
		public function MECNotice($type = false)
		{
			$screen = get_current_screen();
			if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
				return;
			}

			$plugin = 'modern-events-calendar/mec.php';
			if ($this->is_mec_installed()) {
				if (!current_user_can('activate_plugins')) {
					return;
				}
				$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);
				$message        = '<p>' . __('MEC Invoice is not working because you need to activate the Modern Events Calendar plugin.', 'mec-invoice') . '</p>';
				$message       .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Modern Events Calendar Now', 'mec-invoice')) . '</p>';
			} else {
				if (!current_user_can('install_plugins')) {
					return;
				}
				$install_url = 'https://webnus.net/modern-events-calendar/';
				$message     = '<p>' . __('MEC Invoice is not working because you need to install the Modern Events Calendar plugin', 'mec-invoice') . '</p>';
				$message    .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Modern Events Calendar Now', 'mec-invoice')) . '</p>';
			}
			?>
		<div class="notice notice-error is-dismissible">
			<p><?php echo $message; ?></p>
		</div>
<?php

	}


	/**
	 * Is MEC installed?
	 *
	 * @since     1.0.0
	 */
	public function is_mec_installed()
	{
		$file_path         = 'modern-events-calendar/mec.php';
		$installed_plugins = get_plugins();
		return isset($installed_plugins[$file_path]);
	}

	/**
	 **  PreLoad
	 **
	 **  @since     1.0.0
	 */
	public static function preLoad()
	{
		if(static::checkPlugins()) {
			include_once MECINVOICEDIR . DS . 'core' . DS . 'autoloader.php';
		}
	}
} //Base

Base::instance();
