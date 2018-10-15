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
define('DB_NAME', 'union');

/** MySQL database username */
define('DB_USER', 'union');

/** MySQL database password */
define('DB_PASSWORD', 'capricorn01');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* ALEX - enable automatic updates */
define('WP_AUTO_UPDATE_CORE', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fRKCK EsbTjjyg</cTQZ-mlqCM)60yKqB6H2LYAo[~m91Xf<A9+[Cs_$Nu!v=B[L');
define('SECURE_AUTH_KEY',  '51AvJZWZc@728Wq_8c ,Oj;m{mE-yvjE5K:4(98OZ]|6c{|nu5agJbP3d(URQ`}N');
define('LOGGED_IN_KEY',    '_}#4Ke}jH$Q^|Y{@mY(JY}wT4AuC7?7|i(d#i~seAq.;sW1r0{M_OSlb:fD*Cm(X');
define('NONCE_KEY',        '[t_WF{w2[{H5^,`$|(7<ll!rY,ruA(GPuG4yQF8Ds::YDyxk(k9*WW6B(^K*41jP');
define('AUTH_SALT',        '}s/^waB!m0>%c@?nYI)2l 3Yf5l_bbPtwI28.025_ah+vh@q(cwS/2@EP#uH{fqn');
define('SECURE_AUTH_SALT', ':L^GW; d3L!vb%cXsS>RKl7qfV:+)S4-f#T}J4B#0!l_pwJv_?8xBBmN7|(oDl>!');
define('LOGGED_IN_SALT',   'Zt0}6}n$z%$@n!QklINedGK4%Slh#u)a]-m/!^3~qv})%S*UWAsJ&,U:s-=pg<Bf');
define('NONCE_SALT',       '^KXw/]&WC=||LJH?/Bh#?$pKQ&5e!)21km[1#YR**9f@l7A~%2%7||@%aj{Lpv>1');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
