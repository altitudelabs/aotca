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
define('DB_NAME', 'aotca');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '^HsNQ0|AV?_/FX*$[^!cp0fn+SPqv)71<yJ@t](~I1J]Ez5:>I)!A-U?1y&;V3fF');
define('SECURE_AUTH_KEY',  'a)kJ(O?F-C]V.%{KsO&EueT}n cAD3ybqECMjXBmV-p}#l;uvqn[W|DxS@Mfiu4)');
define('LOGGED_IN_KEY',    ']$:$|/^uHxkZRAvfl9)KLnMf  MGBg j#8?%+f]I3tr/7!J/[BrzO*0|}VM`AlT<');
define('NONCE_KEY',        'E*b.Z1,m!Ded/Kaf#UQEE!I@2P*&D|Kd@B &+l@tY>b~do)Vwr$fcY.[Eddd5L]_');
define('AUTH_SALT',        '=g0NTz6[LYqhm1dV&Fm#<0Vz~o3wv3+A>mPPmZ`3jzvY~EU~I [GnKmw&(}:N%[/');
define('SECURE_AUTH_SALT', 'b(`;kaX fmNL}a6UO,GdQ6,-UOr|Fq(ld|EGAAAW$L+  `wAy6fiOtDN+9BZU{K5');
define('LOGGED_IN_SALT',   'HVHmV$HQ*gTP60^I&AnO1t&1CO4FZ)d2#pEc9WiDhKO@%3R{!WO;}48[-S:>IKkw');
define('NONCE_SALT',       'ocGDD3y:[$)NmOXBpLO2i~wBOI>veSMih#:hb4l{[,KU7>q,[JW8H&(p ef&$(&t');

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
