<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nicenap');

/** MySQL database username */
define('DB_USER', 'hero2510');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+%?ZS5&0F!8A*&h#l@6R|]sn9v`{[5?F)BZ$#7eAhRzzb+m?6N0E|<d@=8[e?R?=');
define('SECURE_AUTH_KEY',  'b7*Xj$^lz%yxq7q481oA 9B^&,42`RgW~aMeYgCA|Nteo=>kQ+?h1My5X,?-`|uK');
define('LOGGED_IN_KEY',    '::&|tX#c&J5+Rv_v-m3eT*ZYI#q|G)@3vOHM.=`VmF{pe^t+/f)?%`Knmysx@TiF');
define('NONCE_KEY',        '/MP>X!G}j+GQ2j|c374d+&u.+~z0:}.K:bW|nInNVTdIi$/>JZWb_Kr58PQTfgrB');
define('AUTH_SALT',        '|itQj7HZ|-;Y~]GkUy%cgi2>I.}uX6vl7rMm,5 ISmQg)#O^i{&v X)6fHWSaY3*');
define('SECURE_AUTH_SALT', '#U+[+3;y90SD;sIQzI]2PejZgGm~7|Ji3>^a7t,fyujGWt_dAm=?s!q!W|ccK_L?');
define('LOGGED_IN_SALT',   'TIM~U~9^$:8Wq0I5U+VxiYO25b>o|?Ebj=0R 2UHU]n-)W<lzCs[S7hL+c^Wp=mJ');
define('NONCE_SALT',       ',O^0qyL# m0,~rC/ixQ/9J~|O~jSJ*,1fyIiZqQC<SI>dU|7~BiGJtC{fCpaJ#s}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nn_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_SITEURL', 'http://hero2510.kd.io/napoh');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
