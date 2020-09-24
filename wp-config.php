<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'elmdb_stage' );/*elmdb_stage before*/

/** MySQL database username */
define( 'DB_USER', 'ufeuatsap' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ElmQualif59!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!f!J.(J(C.{nsJ_Z GyVCd+6`-?P8h5`O;v]o}BmkhP/oNk/:L)CXYhH88,.W0L`' );
define( 'SECURE_AUTH_KEY',  'qN/)LdVgJmoEU,+Tq~vt|^;z}2--Y9*i1;kA!=&<Mnm(T(@Ui?LeAN/a4pO>]y3*' );
define( 'LOGGED_IN_KEY',    '/wY~r|y,3e3?}^Z&md4~5H_CVN{:!<[Z<?mqzA=4zRH*3H{iF}5@zgoJ,za{5Ssh' );
define( 'NONCE_KEY',        't.hB6n>OjK>{;:+6WbH:Yf!:igS0&K`-*F/%<5<7]|_+VWX=N;Wm3kOMJBCo&q%s' );
define( 'AUTH_SALT',        '(q);=1V:$6rCb+`CU/@.}Y?qZU-xW5yW!A|cP%I77mHNjeKpN~0{SQ:e/G$blJiJ' );
define( 'SECURE_AUTH_SALT', 'u}-.5dD85zt48hNTg$k7B;r>(?9ya%_cV@(1wqZo/;nbZTaLI:v`S1%2on)201m1' );
define( 'LOGGED_IN_SALT',   '?n)o2GDgknaDzgyXoilU.6zJWh2_8.bn-VV5XQVh.ed`m/g#W$<f{nxwtXw1Lb$7' );
define( 'NONCE_SALT',       'KL+zMFSVR~#NRs@BoDi=Fjigd>EQE)E2?rXmt-HLd^[y?o#0G>F@RrxuRi9Nf4>4' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'elmdb_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true);
define( 'WP_DEBUT_DISPLAY', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
