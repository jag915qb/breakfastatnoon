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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'medicine');

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
define('AUTH_KEY',         'Ul&_G]k?kmyFU@w9e]1e7Vw_ca71l)@[3Ulh-W.+JZ7*mNEn0H!+W0)Pr/HIj}DK');
define('SECURE_AUTH_KEY',  'fQ8H3`/&E;P{76ns!wwR|=14| /649.Jszg[*A?,-woOWiem-zyNTSvb202FW{A@');
define('LOGGED_IN_KEY',    'b<+Ycf+%xz!#WKAK[z=|$z-VIyYHj{RA2&|G_^6Q>ywVCva5eO[N6aohwoN^O9F#');
define('NONCE_KEY',        'q~?p>.|!~.!;2IC-/-#BKR|^Vlo(GTkVQN9n8xQi#;I;hwZ3<+d?[- jiE7bru[A');
define('AUTH_SALT',        'K#s3l^(Y/Ixh</[p?.p?#WB6g7M[X6fvv?j#tH%,&dXT-K)!ieS$-3bwm@c>KZ<F');
define('SECURE_AUTH_SALT', 'Rxun<Y[uq<%.GT<AUX)Ma@)`M<>m |)RowlpU/MVC;A{N& qifa)AlBnp:E!Wu2H');
define('LOGGED_IN_SALT',   'P8|WX1Vz{k$(fzyWuQgV#JRRLqtnF*Q64=L]^qmo7Pn~:I`T(&#yI6:5h:Fs!#z$');
define('NONCE_SALT',       ']q$DAf+|Hd0dRBk+P]g/={B|L$gswk( AHrB}>m)(0b1A:iX$SYfMuXMcYfiGH~y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
