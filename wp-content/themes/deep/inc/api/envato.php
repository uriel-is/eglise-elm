<?php

/**
 * Webnus deep envato class.
 *
 * @author Webnus
 */
class Deep_Envato
{

	/**
	 * User for cashing directory
	 */
	public $purchase_code;

	/**
	 * Deep remote update path
	 */
	public $update_path;

	/**
	 * Deep current version
	 */
	public $current_version;

	/**
	 * Deep slug
	 */
	public $slug;

	/**
	 * Deep expires
	 */
	public static $expires;

	/**
	 * Deep date
	 */
	public static $purchase_date;

	/**
	 * Deep current date
	 */
	public static $current_date;

	public function __construct()
	{
		$theme_data = wp_get_theme();
		$this->slug = $theme_data->Template;
		$this->current_version = $theme_data->Version;
		$this->purchase_code = get_option('deep_purchase', '');
		add_action('deep_before_start_dashboard', array($this, 'deep_license'));
		add_filter('pre_set_site_transient_update_themes', array($this, 'check_update'));
		add_filter('upgrader_post_install', array($this, 'after_install'), 10, 3);
		add_action('wp_ajax_wnThemeActivate', array($this, 'get_purchase_code'));
	}

	/**
	 * Yearly license check
	 *
	 * @author Webnus
	 */
	public function deep_license()
	{
		if (get_option('deep_purchase_type') != 'yearly') {
			return;
		}

		// Yearly license expiry date
		if (!empty($this->purchase_code)) {
			$code = $this->purchase_code;
			$url  = 'https://webnus.net/?edd_action=check_license&item_id=785&license=' . $code . '';
			$current_date = date('Y-m-d', time());
			$item = '';

			if (!get_option('yearly_request_again')) {
				$item = wp_remote_get(
					$url,
					[
						'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
					]
				);
				$data = json_decode(wp_remote_retrieve_body($item));
				update_option('yearly_request_again', ['date' => $current_date]);
			} elseif (get_option('yearly_request_again') && get_option('yearly_request_again')['date'] < $current_date) {
				$item = wp_remote_get(
					$url,
					[
						'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
					]
				);
				$data = json_decode(wp_remote_retrieve_body($item));
				$update_option = get_option('yearly_request_again');
				$update_option['date'] = $current_date;
				update_option('yearly_request_again', $update_option);
			}

			if ($item) {
				$date = explode(' ', $data->expires);
				self::$expires = $data->expires;
				self::$purchase_date = $date[0];
				self::$current_date = $current_date;

				if ($data->expires != 'lifetime') {
					if ($date[0] < $current_date) {

						// Auto update for expires
						$theme_version = wp_get_theme()->get('Version');
						$check_version = wp_remote_get(
							'http://webnus.biz/webnus.net/theme-api/version',
							[
								'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
							]
						);
						$expires_version = json_decode(wp_remote_retrieve_body($check_version));

						$update_option = get_option( 'yearly_request_again' );
						$update_option['last_version'] = $expires_version->version;
						update_option( 'yearly_request_again', $update_option );
					}
				}
			}

			if( get_option('yearly_request_again')['last_version'] > wp_get_theme()->get('Version') || get_option('yearly_request_again')['date'] <= $current_date ) {
				// Renew message
				echo '<div class="deep-license-notice"> <p>You need to renew your licence. To proceed please click  <a href="https://webnus.net/checkout/?edd_license_key=' . $code . '&download_id=785" target="_blank">here</a> </p> </div>';
				// Upgrade message
				echo '<div class="yearly-msg w-box-content"> <p>Those with the Yearly Access to All Themes license can upgrade their license to Lifetime Access to All Themes for a limitted time, only by paying $299. That\'s $100 in savings! To upgrade just login on webnus and do the following Click on Downloads in the <small>menu</small> > <small>View Licenses</small> > <small>View Upgrades > Upgrade License</small></p> </div>';

				if( get_option('yearly_request_again')['last_version'] > wp_get_theme()->get('Version') ) {
					$path = wp_upload_dir()['path'] . '/deep.zip';
					$themes_dir = get_theme_root();

					echo '<div class="deep-license-notice new-update">
						<p>New update available please click <a href="' . admin_url('admin.php?page=wn-admin-welcome&update=yes') . '">here</a></p>
					</div>';

					if (isset($_GET['update']) && $_GET['update']) {
						if (!file_exists($path)) {
							if (wn_check_url(deep_ssl() . 'webnus.biz/yearly-update/deep.zip')) {
								$value = deep_ssl() . 'webnus.biz/yearly-update/deep.zip';
							}

							$get_file = wp_remote_get($value, array('timeout' => 999, 'httpversion' => '1.1', 'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'));
							$upload = wp_upload_bits(basename($value), '', wp_remote_retrieve_body($get_file));

							if (!empty($upload['error'])) {
								return false;
							}

							function move_file($file, $to)
							{
								$path_parts = pathinfo($file);
								$newplace   = "$to/{$path_parts['basename']}";
								if (rename(
									$file,
									$newplace
								))
								return $newplace;
								return null;
							}
							move_file($path, $themes_dir);

							function deleteAll($str)
							{
								if (is_file($str)) {
									return unlink($str);
								} elseif (is_dir($str)) {
									$scan = glob(rtrim($str, '/') . '/*');
									// Loop through the list of files
									foreach ($scan as $index => $path) {
										// Call recursive function
										deleteAll($path);
									}
									// Remove the directory itself
									return @rmdir($str);
								}
							}
							deleteAll($themes_dir . '/deep');

							// extract
							$zip = new ZipArchive;
							if ($zip->open($themes_dir . '/deep.zip') === TRUE) {
								$zip->extractTo($themes_dir);
								$zip->close();
							}

							unlink($themes_dir . '/deep.zip');
						}
					}
				}
			}


			// Five license
			$action_url = site_url();
			$url_five  = 'https://webnus.net/?edd_action=check_license&item_id=1390955&license=' . $code . '';
			$item_five = wp_remote_get(
				$url_five,
				[
					'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
				]
			);
			$data_five = json_decode(wp_remote_retrieve_body($item_five));

			if ($data_five->item_name == '5 License for All Themes') {
				$active_five = 'https://webnus.net/?edd_action=activate_license&item_id=1390955&license=' . $code . '=' . $action_url . '';
			}

			// Ten license
			$url_ten  = 'https://webnus.net/?edd_action=check_license&item_id=1390913&license=' . $code . '';
			$item_ten = wp_remote_get(
				$url_ten,
				[
					'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
				]
			);
			$data_ten = json_decode(wp_remote_retrieve_body($item_five));

			if ($data_ten->item_name == '10 License for All Themes') {
				$active_ten = 'https://webnus.net/?edd_action=activate_license&item_id=1390913&license=' . $code . '=' . $action_url . '';
			}
		}
	}

	/**
	 * Set update path.
	 *
	 * @author Webnus
	 */
	public function set_update_path($update_path)
	{
		$this->update_path = $update_path;
	}

	/**
	 * Get update path.
	 *
	 * @author Webnus
	 */
	public function get_update_path()
	{
		return $this->update_path;
	}

	public function get_purchase_code()
	{
		check_ajax_referer('colorCategoriesNonce', 'nonce');

		$purchase_code_val = $_POST['purchaseCodeVal'];
		$purchase_code_type = $_POST['purchaseCodeType'];
		$item_name = '';

		switch ($purchase_code_type) {
			case 'one':
				$item_name = '1 License for All Themes';
				break;
			case 'five':
				$item_name = '5 License for All Themes';
				break;
			case 'ten':
				$item_name = '10 License for All Themes';
				break;
			case 'yearly':
				$item_name = 'Yearly Access to All Themes';
				break;
			case 'lifetime':
				$item_name = 'Lifetime Access to All Themes';
				break;
		}

		update_option('deep_purchase', $purchase_code_val);
		update_option('deep_purchase_type', $purchase_code_type);

		$verify_url = 'http://webnus.biz/webnus.net/theme-api/verify?activate&item_name=' . urlencode($item_name) . '&id=' . $purchase_code_val . '&url=' . get_home_url();
		$ch_verify = curl_init($verify_url);
		curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
		$cinit_verify_data = curl_exec($ch_verify);
		curl_close($ch_verify);

		$result = ($cinit_verify_data == 'activate') ? 'success' : 'failed';
		update_option('deep_purchase_validation', $result);
		echo $cinit_verify_data;

		wp_die(); // this is required to terminate immediately and return a proper response
	}

	/**
	 * Add our self-hosted autoupdate deep to the filter transien
	 *
	 * @author Webnus
	 */
	public function check_update($transient)
	{
		if (empty($transient->checked)) {
			return $transient;
		}

		// Get the remote version
		$new_version = json_decode(json_encode($this->get_deep_info('version')->version), true);

		// Set deep update path
		$dl_link = !is_null($this->get_deep_info('dl')) ? $this->set_update_path($this->get_deep_info('dl')) : NULL;

		// If a newer version is available, add the update
		if (version_compare($this->current_version, $new_version, '<')) {
			$transient->response[$this->slug] = array(
				'theme'            => $this->slug,
				'package'        => $this->get_update_path(),
				'new_version'    => $new_version,
			);
		} elseif (isset($transient->response[$this->slug])) {
			unset($transient->response[$this->slug]);
		}

		return $transient;
	}

	public function after_install($response, $hook_extra, $result)
	{
		global $wp_filesystem; // Get global FS object

		$install_directory = get_template_directory(); // Our theme directory

		$result['destination_name'] = $this->slug; // Set the destination name for the rest of the stack
		$result['remote_destination'] = $install_directory; // Set the remote destination for the rest of the stack
		$wp_filesystem->move($result['destination'], $install_directory); // Move files to the theme dir
		$result['destination'] = $install_directory; // Set the destination for the rest of the stack

		return $result;
	}

	/**
	 * Return details from envato
	 * @author Webnus
	 */
	public function get_deep_info($type = 'dl')
	{
		if ($type == 'dl') {

			$item_name = '';
			switch (get_option('deep_purchase_type')) {
				case 'one':
					$item_name = '1 License for All Themes';
					break;
				case 'five':
					$item_name = '5 License for All Themes';
					break;
				case 'ten':
					$item_name = '10 License for All Themes';
					break;
				case 'yearly':
					$item_name = 'Yearly Access to All Themes';
					break;
				case 'lifetime':
					$item_name = 'Lifetime Access to All Themes';
					break;
			}

			$verify_url = 'http://webnus.biz/webnus.net/theme-api/verify?item_name=' . urlencode($item_name) . '&id=' . $this->purchase_code . '&url=' . get_home_url();
		} elseif ($type == 'version') {
			$verify_url = 'http://webnus.biz/webnus.net/theme-api/version';
		} else {
			return;
		}

		$ch_verify = curl_init($verify_url);
		curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);

		$cinit_verify_data = curl_exec($ch_verify);
		curl_close($ch_verify);

		if ($cinit_verify_data != '') {
			return json_decode($cinit_verify_data);
		} else {
			return false;
		}
	}
}

if (is_admin()) {
	new Deep_Envato;
}
