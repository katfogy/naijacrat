<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'anigeria_naijacrats_db' );

/** Database username */
define( 'DB_USER', 'anigeria_naijacrats_user' );

/** Database password */
define( 'DB_PASSWORD', 'naijacratsdbpassword' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'iL!WY>kOm& |[JdvcopZ&3g%y[eO[5yPIH I~i`}^$sQ-RfzEoIy.k-!UA+ )>:H' );
define( 'SECURE_AUTH_KEY',  'H6Q^>}-];+$ ;3Dh.iabP(P9iBfT%2H9Xk?8Pn7qs/A&]E44)V^$#O{E>|ja~(S|' );
define( 'LOGGED_IN_KEY',    'XR[xA/O*URjxO-T%7#;7}C?GPvx.]Kt1=RekQMQ?N*OC2Kx@l0U>bC.U#lb:tw-z' );
define( 'NONCE_KEY',        '1G5h8sXC[N5 @4.P3WmvpKCT`:gOM%d(e?o4dTHCPR;J~e6$qH#a~U(.kfXI+q&C' );
define( 'AUTH_SALT',        '-h+-]djvBDk$tq!H45{=c^~}HQ$$7@S|Sez=jTa&Op4HI<&Yo8<$@&tOuZ(wgnXk' );
define( 'SECURE_AUTH_SALT', ':WiL^4mrj--v=P~&; J)h8_34dJZbe)`.KN2|Wuz2+ld3~;5)eQHZt!JfMvEu-}Q' );
define( 'LOGGED_IN_SALT',   '>o0`{M$Zr_{nrv3$9a gh/MQg--2YYoTaFUAgt=g:DG`y@00+>=5S*%Mpn@U%M1[' );
define( 'NONCE_SALT',       'OhB.!05QZs:z9>*b;Fz@DGPYnnA<[jt&`[X(ClB;p8Q,).!PeoVXy> AYKDEu4=F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
