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

define('DB_NAME', '');


/** MySQL database username */

define('DB_USER', '');


/** MySQL database password */

define('DB_PASSWORD', '');


/** MySQL hostname */

define('DB_HOST', '');


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

define('AUTH_KEY', 'c58f840c433a538b1374a7945168b27f0ac091b3cf32f341d1f45e92610ac99c');

define('SECURE_AUTH_KEY', 'daecdb538be226a7d2bb4e6ac22c93d44e412f2ce2a555e7dbef65cd685e62ba');

define('LOGGED_IN_KEY', '82363b0b8c773a3d82b75e910c85423e9e397e15de4cf07a40411eab3e95bc67');

define('NONCE_KEY', '861bd7f067705dbcb0b2c965171499ee8498013c6f636b65ac59ac5d5a32bbe4');

define('AUTH_SALT', '8f5a34dde12a990525deaa9aa731a5856c445b5e6b1b64fcd8c742c7391ed338');

define('SECURE_AUTH_SALT', '1a84e82e625efcf80421ebfb03d263e138b5fcc9d5226f636ba21128d4cd25b7');

define('LOGGED_IN_SALT', '22d33d61a13385bf59779db41c06ca06463a3e13bb20dce1a14417ad5ec26b47');

define('NONCE_SALT', '8148f3017b790e9e94fad135fef092b4e79b5f72e3277166aed0eaa0e231ad08');


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


define('FS_METHOD', 'direct');


/**

 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.

 * If you want to access only from an specific domain, you can modify them. For example:

 *  define('WP_HOME','http://example.com');

 *  define('WP_SITEURL','http://example.com');

 *

*/


if ( defined( 'WP_CLI' ) ) {

    $_SERVER['HTTP_HOST'] = 'localhost';

}


define( 'WP_SITEURL', 'https://iescelia.org/museovirtual' );

define( 'WP_HOME', 'https://iescelia.org/museovirtual' );



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');



//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks

//  More info at: https://docs.bitnami.com/?page=apps&name=wordpress&section=how-to-re-enable-the-xml-rpc-pingback-feature


if ( !defined( 'WP_CLI' ) ) {

    // remove x-pingback HTTP header

    add_filter('wp_headers', function($headers) {

        unset($headers['X-Pingback']);

        return $headers;

    });

    // disable pingbacks

    add_filter( 'xmlrpc_methods', function( $methods ) {

            unset( $methods['pingback.ping'] );

            return $methods;

    });

    add_filter( 'auto_update_translation', '__return_false' );

}

