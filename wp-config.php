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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '1aba762c77a0082eae05452037aa5669121b3c7b2913f1e46de84a546a0b132a' );


/** Database hostname */

define( 'DB_HOST', 'localhost:3306' );


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

define( 'AUTH_KEY',         'Mo)71}R2p$5n^2L+|}C^3ePeZ:!Z<D*nQ&>^Pb2a?%8YCm[CnJ}M(p(MP3`]&Tg=' );

define( 'SECURE_AUTH_KEY',  '`nX<%[A(p<sj1fVPa))!NX^1.?6.p[Fx#!Y]+,aZ2VW/B7@7>_UVVQ?JT=g(tQ_n' );

define( 'LOGGED_IN_KEY',    '?L%V`6H&(F%,uU23k|q1&u>aO=(szpt`D;2*sFcBaXnGS)OOy8.@Dw5> ZwBq/t9' );

define( 'NONCE_KEY',        '1Z4M%tHnx_$|Vs]:s&Xt#0DQ]Q+iu+(E]wS)#ck1I$|b}{cxtXxcU=.!rVo+5}6$' );

define( 'AUTH_SALT',        ':Ap3m51yPV4+n[+q3k1_iYc;5H*%~3=9wT7Ow<NI{)X+nMz%2F2@A`D*Q7y[O]{k' );

define( 'SECURE_AUTH_SALT', 'w)Bj6(6V#/F[P!lE,Pol1HXk.KkD5*N WT#wXvy+s_I4dIl[T60aMyg/rj,(29.e' );

define( 'LOGGED_IN_SALT',   '&ans{X-I. $J@$@~$;#Zt@TD2muiX^?]X@1tq#iK<pT))c`Y_cT^J16^.z<?z6#|' );

define( 'NONCE_SALT',       'Kx:aStlke-($FljZ];CH+um;+qNUJ&(YRDcmzac)GhS96!me{O,W6<cud}$fF91=' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

/* define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
*/
define('WP_HOME','https://robota.express');
define('WP_SITEURL','https://robota.express');
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
