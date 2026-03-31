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
define( 'DB_NAME', 'rehap_lp' );

/** Database username */
define( 'DB_USER', 'rehap_user' );

/** Database password */
define( 'DB_PASSWORD', 'Relybit.2025' );

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
define( 'AUTH_KEY',          ':nVX%f[Ox{~RPCpo6h_)@j}W5L.*#s07P^F7I5TaN2Br,,Y!X%lKW{ET`3qWQ&)s' );
define( 'SECURE_AUTH_KEY',   '&bg&}zBvlQ)e#(.S$6x1yOBK=A/JhD!@HIt8X{bM)yxTJsHJwY5H0-MDIh#e-S:$' );
define( 'LOGGED_IN_KEY',     ';]K&7f&0 ln(q)bup d==4S<%i,^B]62^Z{5vVu}oK]&#yzWfpAn}qg%{AQ{(VUX' );
define( 'NONCE_KEY',         '{g%_%z.a:]5-6hWStLncB5MX;Wn/*LvTKNZZd{^scWaXyG6G.M }cwZ^cT%+sLL7' );
define( 'AUTH_SALT',         'Y3Ea+$m#F(L%|NW2Z.Ww6(B<vIy`w5>, Rw=PL>nB6#XFbQr:QJ>#JNtwgx$:Qn,' );
define( 'SECURE_AUTH_SALT',  '9BcFclN7oK:_<s~OK!M2B5Qa.^zYo)Q$dN!6Q7;-bkQ@5#LcEiR ^MR!#<<(bA]K' );
define( 'LOGGED_IN_SALT',    'gt$*[KZ7:RSv*q~N9#Ie?`!6PXl$.BH%v%aO99_Ri-CeR*+!= {HyEX~$qcr?kJd' );
define( 'NONCE_SALT',        'YN@n`n*veEma$:@&urcZ0N=(pkCutCN>JUd,LTf=U-uq?!oR{,zNYRo#8Xsa9jV|' );
define( 'WP_CACHE_KEY_SALT', 'xz+BqtS`>@Bn>#o|s4x^x3n6f0m(rbp$a=~WG|}9gETVs]I&B!Ipi,7%2x  j/V)' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_LOGIN', true);
    define('FORCE_SSL_ADMIN', true);
}


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

define( 'RS_DASHBOARD_PLUGIN_SID', 'oD2Z5iRWrhdJl_QSwlmWH--1mNQeqg87unkqh3OvOQtTIXZN0kBrMufhUEzZQBZu2XnIr40lewesDaLULAI7qPiCwt2p0BQAHaczm6eDabg.' );
define( 'RS_DASHBOARD_PLUGIN_DID', '9n9TmeWhdtEE6vlrNMu46EtPPc_-Buip1plLVaGLsvyFeqrNy1zxXTwsveYKuIM_4YOyr-deku0YZ5DBLgX_7nD3GwvnS2HrquXu5lXkfDs.' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
