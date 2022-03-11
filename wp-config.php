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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZGb/X4es7No/HPFg+6Hf3vuGwpYu93yAC/5sEF/Pa+dc2jBzE9xvWOZWA/jawMjHZVTQ1fG1jtWPA74VOvKnIQ==');
define('SECURE_AUTH_KEY',  'bhZhGdnIeniMA+Y4So04OdPSQ23niWOW2UaxG23mKr3W9jvYwD3vzVq2g/ClTDa5VEaZ9rkKm7y0qsgwXtytSw==');
define('LOGGED_IN_KEY',    'y3mXWOxEAlpHIDNVsWvlQOmd5obp6XORAXjk7U/2eKpYYgZrQH7RTPnIP7FszaXgdYTa67F86LYaUUc5NfnyoQ==');
define('NONCE_KEY',        'FG0Q4VeqmISee6ucclHC8Fv6da9EtMHNJ/cmYcNXtqWk0bjzCiGzN4Igv/d/onj5bOkez/8MabeQseFyX24f5w==');
define('AUTH_SALT',        'JH5KCje6BC65y6JTNHohsz2NgmmfvyXOz25ELLo+epNNIlcaoqBQ3G+d3xSGanWzyYseIimRLxKyK7IIgvIEUg==');
define('SECURE_AUTH_SALT', 'cBM+uZQS0I1BcWPvERGmuLNPDuNhHEd/pN6M5Q7hRASM5uAdS7V1WC9GcDMfKYeJzqmNuJJ7Zny58ozj6OQx7w==');
define('LOGGED_IN_SALT',   'IyTmzjs/mS1+hTWxidmLQB+kmFHgMzhSPUxtKc22RBfhFUcEmnEYRIAXfKiDK+MT4X3vU3AJERGBZRDdg0arYQ==');
define('NONCE_SALT',       'HJdOwgFS6Svn0aLA6BCZzQavcFi/KOU82MheLxPck+yqDPXYdHBMDzCGjdkiAVEQGiJ6xNf8XSe9TKh81x2W9g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
