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
define( 'AUTH_KEY',          'Q>Yj_0|;lf$<//smms)G]~rgj|gl`$a}+8x)5wDs6x2QwcfVI|p/{z[~FIo`x/im' );
define( 'SECURE_AUTH_KEY',   'iK.q_+d).,Ft@U)y(TKGunItW5djJzo3NsNyA8]a%opJ*<8vNMKhfcgVCtAv9f9[' );
define( 'LOGGED_IN_KEY',     '7kv>?-Fw;]&N_QW3R56c9=@g[b@<46wHxj/0Luk:3X+h(],tA<):94G}c/$5pDN]' );
define( 'NONCE_KEY',         'Ybu=6=lZ{iOh-H3:?C+Xx{Ea_lPy41]|Um_;yI^:~%fDATj(S-RbC,FWFbU;U3aA' );
define( 'AUTH_SALT',         '-{xUvBhu3t4Eq`8FM+1*TfCR|7BoX:46Ei>D3bRZ~koz;,qUjl&hm4Q)WpK:.VO|' );
define( 'SECURE_AUTH_SALT',  '!sJH@-Q8=3~IA4U=a_xX%WvC.QV+p><_:QiPhAm5Wv64aZwwo%<1Lry,xkEhl<GE' );
define( 'LOGGED_IN_SALT',    '(vt&ZA2A:_jF~Tukqe_NEsd@e_U2cGI_>u]a9 M9+U6<SSUWS2$egVy)~3[Q;R?{' );
define( 'NONCE_SALT',        'RGLu#+s.^[5a!s8!NsoU?m5(g9Zw{l93I>PwZkAp/<I|V.2&@4XLzeX80QLR$vtf' );
define( 'WP_CACHE_KEY_SALT', 'M0vE >Ay-pF[4<_; <A^dF--zqpo =MqMCpPuv,Pk|~(b~TVJQ^l4U(]P(-~3p`?' );


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
