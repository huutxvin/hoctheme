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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hocthem');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456a@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'yw7B>}%mJLl.<*AfnQR%T2dr{c9(En}t,}76PWpWVesnP129.HrNB9Dp@jqw+FuK');
define('SECURE_AUTH_KEY',  'K{J(:oe%<$+N8[r~u[pkqTlMLayP+-w)sK9dDk0.95Zc!skF8=QZXcKZ,0_> ~{T');
define('LOGGED_IN_KEY',    'S2AWuFsMa19SQ?zsfRp{txB#*cV*r?xkjg4}D?hag}+GcV?u`$m}YiG2{y%w_]mq');
define('NONCE_KEY',        'Ex6wa<-w6MAI591prTF;f]o@1sc^8HnkiQx-Yu>Ju}0.{S~swuN}L-]J8Phqdpm8');
define('AUTH_SALT',        'Lb5.qHtcY[>h64C]U}m=-tjXYd/{0$OGu0J/ w z5/?xV?r(CWNJGqCU!((^XsPP');
define('SECURE_AUTH_SALT', 'tuo$@1l8/&{:;lRfLCzRt*W*$[+Q EkwXd_J6gZTp;iIq!9x$9BKGtl?8fLZSqR/');
define('LOGGED_IN_SALT',   '5v{PyJ,|o7|>!w96{>f+;AD1c/E-vZHmV%?jSX=Nk=k&ojLn_;2S1l#cd%^qDk8/');
define('NONCE_SALT',       '^m;<_vv<3iM$Ar^vzBlX@XQMB^HV6nd}!-V,:i)ou>R6A<IrfsoD4U~*h3`v?;QM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
