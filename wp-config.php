<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u116616108_VVRRh' );

/** Database username */
define( 'DB_USER', 'u116616108_hOruc' );

/** Database password */
define( 'DB_PASSWORD', 'EyAfIVYlFm' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          't}7Y^+iGp&(D8.ANS,!@QP5Lp5]YmVAnzJ GS^-RY_,G@]azX10F&^JbtBJ:/#U&' );
define( 'SECURE_AUTH_KEY',   'z!!gKq61$h5wG9Bhy~*l@%a&RoBoLtJ@;b{wKMU;HC/:cXF1G H^Ka!|+Fp;YE1$' );
define( 'LOGGED_IN_KEY',     'g{^c!=:9Nqf+ 6-W$jXkrSCK#k:nAinSjs(4w$e&i>tQ_<%0gd_{Yy`/2x-m4Rb4' );
define( 'NONCE_KEY',         'w B4;mnjK6B5FEEDA5OW,Z{,PKiB>Wvp4F2=lCcW}&#}E$UJDp~J($FjI:t>E8do' );
define( 'AUTH_SALT',         '<NCRyxrcBT`a]jL )Z<2`;}?vI&taN|i^%|URRaFt rf:X@ D7=$~i(^vqM`j}h+' );
define( 'SECURE_AUTH_SALT',  '44<G(WrA@L%)se&2ehY2`4T+?`HK)o~<6V<A_X+ c3,hJ}(_,jcr`.-]^.aiP6jD' );
define( 'LOGGED_IN_SALT',    'L>+E_[XeaSSgM*az^9NLB#NLG(l.;h5&}$nmg&9_^RQXD3.Sl(,NAD}t![w4; </' );
define( 'NONCE_SALT',        'RQn51Ku1F`y8`pYLuFi-ev%k{*Ixhf{qR]I!vS!Xhx[S|Y%|G:n>EvTkeqr|0OHm' );
define( 'WP_CACHE_KEY_SALT', 'Taz`| cC{C@bj^@l;tWJ5qz9z8#urmmo@dC+8rk@uoz/~ fdzg9fRAn<}cD/|c6,' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
