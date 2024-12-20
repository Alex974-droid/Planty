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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'zY]vQrRlj<Vt@1Y^, !_MO=?nbnrXg5DKIW,gQ=Q--Jn+|U:LjGpeCh&UMSuU&a.' );
define( 'SECURE_AUTH_KEY',   'kgc]+YY3sAOk]%aqaY?q@5#Zcf#XJefhtOPGU8p50&ujhIS:?< Yoq70,DZG6 vx' );
define( 'LOGGED_IN_KEY',     ']Vx/2z$nNq@MH..cIOW^f63_v#UM/z-CKfVcvOaw9~NjgUDNZ.S$((s9q?Fx9<BO' );
define( 'NONCE_KEY',         ' =_D~(Pprag?_Id/.Wa@SasKwr;kZ%Z8lG(O,I.hPCO13*MB}k9TQ=,-)[_9Wx&=' );
define( 'AUTH_SALT',         'qYbGT_k]7LdzUL^h!7GuK/P=eQ,tiCZm_[#?icq%~1fhDa!8>3X4BeO5_>;jSgP~' );
define( 'SECURE_AUTH_SALT',  '[_ef:ZauH?.PPt@)xHIHG[Y@89T~`BdVU&i)66B:-G(CY/AnL)j1rP!!QLgSMzRg' );
define( 'LOGGED_IN_SALT',    'Vdc^a-Y.[?pn/A|Jw<A$z?cm{mxCj+d0d<fNJ:xo`{Tx[4-lXFnn+C{x7h,vbYQp' );
define( 'NONCE_SALT',        'u>za&tC9iC8)8BJ6kXt<=B 4%}bv$]XBIQBl9Xr_#ap~;`>=O)`hj4Vk$d2|iUAW' );
define( 'WP_CACHE_KEY_SALT', 'pr,L;>}98Ew${I|R4~zT.xL],&wokC_UAO@DPd.#,j(-%*U]Bsd2wjRjv$^JK1%}' );


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
