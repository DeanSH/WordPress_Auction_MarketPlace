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
define('DB_NAME', 'deadb2');

/** MySQL database username */
define('DB_USER', 'Dea');

/** MySQL database password */
define('DB_PASSWORD', 'Dea');

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
define('AUTH_KEY',         ',`fX:XD68e?97qMeeV(EVHY&0yjG8yqiY.&5C>^U5oXhny9OZm=otps}K^(fH05z');
define('SECURE_AUTH_KEY',  'wgtn*!&{$qYVE9y=T& D[s8M5T`0,:]@+^9Wa)?6+T*e:W7C*vG3TS^Cd?<[k$/n');
define('LOGGED_IN_KEY',    'j3yWjuP$O$)~qUW5[~EgU=#BGt>p6vI,~&xh-rY$Kp%|Z-;]j-l!~JAeg97(f~eZ');
define('NONCE_KEY',        '6p&P!;HB<= $Q+7m$P,N@+jUjancN;=`dzk!q,eO2-tmnHv}um6^GGi9#n_+ol`T');
define('AUTH_SALT',        'a<!o/GE&WQ%f7)^8J{L/RvSx(5OTE/R^M/kJ-<6U?GY?6a-rdbrsweG@TD oF2AZ');
define('SECURE_AUTH_SALT', 'y%GHdcYEdU$C92#+a43#hncd6ySNl3qt_PW&I>q(q$)F#wm2D~B&HeLg<~m,Yhx^');
define('LOGGED_IN_SALT',   'Wj B,m@6BJl><:2lE0]::.;;ajQ&r4eeQBuTA!|!PT2vmspt0z=)%Upofl..7S;8');
define('NONCE_SALT',       '._:E]~?)+|Fuw5<N6Z U~Y-K!,n>o2FWxBrt7=a%E/2#j^MWOPOqKru$&4x;-yh.');

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
