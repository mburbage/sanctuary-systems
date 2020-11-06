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
define('AUTH_KEY',         'VdnwaJFzQ8ipyH4iVc0fiWBgFJ9YJfNdL93bmY3bSOLs+NCMmN4QVo+uD4umrXLXkRFDpau2BYlu1MManizsTw==');
define('SECURE_AUTH_KEY',  'NH/qUtXmAottFhlHG08/iICrWFun903p5Ue9MqWQtVGBSF1HcMiLMkNIjj72aMYSIJVflBB9G5543WGvOPL8lw==');
define('LOGGED_IN_KEY',    '2gSPhYqwrKRf5/7fBR9vgc5I8o4dAssYWv1FytcgpHVaY9g44xlYJKknywh317XvtZ4LAD+FZwUzfcL1XSG1YA==');
define('NONCE_KEY',        'WwSviBysoHKOvRtWZC/BF/Dzc1DZGvVhocAVJBbGDfd5gXUfcEfVvGT4urs3PwSK4p+hRQE6VHAJwlI9s6Nsuw==');
define('AUTH_SALT',        'MC0NhxZd/hlpy1BBSCjI0YWhFfnkx842bOUT0guVNZGPQr1rEW+wFwxr3zWQjSFblPxzO2gv73zY4a/YdCczBg==');
define('SECURE_AUTH_SALT', 'PjAJaPRThUI4uSSQztZXl1yo9v/ZJtRMNKELG5YusRvlzQi6wAt0ycfAQN9sxPFoH5W+PnkVHLnWIInNraaPxQ==');
define('LOGGED_IN_SALT',   '3eeI6iWkA+DnfZYFYcvUj8E78dG3mOa0ngHwsP0UveSnkZMe9SXbfYLTeelriJnr3gvayjmN9nj4Ku3ERC1ZSg==');
define('NONCE_SALT',       'YNX/R4iH0nuYTiqnEAuhe5RiiNcdKaUI/MjcDD9pPXm5cE9lyo8VCsID2o0655c6XrJGFut/XL1v08uDu9QYug==');

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
