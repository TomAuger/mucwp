<?php

/*
Plugin Name: Art & Science MU Plugin Loader
Plugin URI: http://artscience.ca
Description: This auto-loads all the core functionality required for the customization of your site and cannot be modified lest key portions of your site's functionality be removed.
Author: Tom Auger, Art & Science Experience Design
Version: 1.2
Author URI: https://ca.linkedin.com/in/dottom
*/

/*
 * Responsible for autoloading all plugins in mu-plugins folder, because WordPress doesn't do it for you the
 * way it does in the plugins folder.
 *
 * First we define our constants:
 * ZG_PLUGINS: mu-plugins coming from Zeitguys/Tom Auger legacy code
 * AS_PLUGINS: A&S Plugins that we have created over time and are reusing
 * CLIENT_PLUGINS: Any client-specific code that has been created specifically to handle business requirements for this project
 *
 * Next, we look through these three directories, looking for either bare .php files, which will be loaded and executed (required),
 * or for folders that have a .php file inside them with the exact same name as the folder (eg: `Sample_Plugin/Sample_Plugin.php`), and
 * we load and execute that .php file.
 *
 * MULTISITE SITE-SPECIFIC PLUGINS
 * -------------------------------
 * We have configured the loader so that we can load different plugins depending on which "site" we are on in
 * a multisite setup.
 *
 * Currently this project is NOT multisite, so any client-specific functionality should simply be placed
 * within the "all" subdirectory. This ensures that should the site ever become a multisite, the functionality
 * will be available to all "sites" within the multisite network.
 *
 *
 * INITIALIZING PLUGINS
 * --------------------
 *
 * Finally, we execute the MU_INIT_FILE (typically `mu-plugins/init_plugins.php`) and that is used to run any plugins that
 * don't run themselves, or need to be configured for this installation specifically.
 */


/**
 * This will be the text domain that all client-specific "plugin" files will use to generate their
 * localization strings. Change this on a per-client basis. It's probably all you would ever need
 * to change in this file.
 *
 * It's OK (and recommended) for the value to be the same as the constant. POEdit actually looks
 * for the constant name (not the value), so it's the constant name that's important here.
 */
define( 'LUMOSNOX_TEXTDOMAIN', 'LUMOSNOX_TEXTDOMAIN' );

/**
 * "Required" or "must-use" functions and classes required by the client (but theme-independent) go here.
 */
define ( 'CLIENT_PLUGINS', WPMU_PLUGIN_DIR . '/client/' );


/**
 * This is where we put any "must-use"  third-party plugins that we don't want the client to be able to deactivate.
 * A good example would be Advance Custom Fields (ACF)
 */
define( 'VENDOR_PLUGINS', WPMU_PLUGIN_DIR . '/vendor/' );


/**
 * Art & Science plugins that are required for this project and contain reusable but essential business logic go here.
 */
define( 'AS_PLUGINS', WPMU_PLUGIN_DIR . '/as-lib/' );

/**
 * Zeitguys plugins that should not be disabled by the client go here.
 */
define ( 'ZG_PLUGINS', WPMU_PLUGIN_DIR . '/zg-lib/' );

/**
 * Core Zeitguys functions and classes that other ZG Plugins may depend on (Webformz, utils, etc) go here.
 * These files are NOT loaded directly, but should be require()d by the ZG_Plugins that need them.
 * This subdirectory is included for legacy purposes and should not be altered (except by Tom!)
 */
define ( 'ZG_LIB', ZG_PLUGINS . '/lib/' );

/**
 * This file will be loaded last in each directory, after all other plugins/dependencies have been loaded in.
 */
define( 'MU_INIT_FILE', 'init_plugins.php' );


/**
 * TEXT Domains
 */
define( 'AS_PLUGINS_TEXTDOMAIN', 'AS_PLUGINS_TEXTDOMAIN' );
define( 'ZG_TEXTDOMAIN', 'zg-textdomain' );




// --------------------------------------------------------------------------------------------

/**
 * _loader Functions
 * First, load any vendor plugins, looking in each directory and requiring the first .php file it sees.
 */
foreach ( glob( VENDOR_PLUGINS . '*' ) as $subdir ){
	if ( is_dir( $subdir ) ){
		$files = glob( $subdir . DIRECTORY_SEPARATOR . '*.php' );

		if ( ! empty( $files ) ) {
			require_once( $files[0] );
		}
	}
}

/**
 * Look for any loose .php files at the plugin dir level, or dig into any folder and look for a PHP file that has the same name as the folder.
 */
foreach ( array( AS_PLUGINS, ZG_PLUGINS ) as $plugin_dir ) {
	foreach ( glob( $plugin_dir . '*.php' ) as $filename ){
		if( $plugin_dir . MU_INIT_FILE !== $filename )
			require_once( $filename );
	}

	foreach( glob( $plugin_dir . '*' ) as $subdir ){
		if ( is_dir( $subdir ) ){
			$main_class_file = $subdir . DIRECTORY_SEPARATOR . basename( $subdir ) . ".php";
			if ( file_exists( $main_class_file ) ){
				require_once( $main_class_file );
			}
		}
	}

	if ( file_exists( $plugin_dir . MU_INIT_FILE ) ) {
		require_once( $plugin_dir . MU_INIT_FILE );
	}
}

/**
 * Dig into "client" plugins, and then look for "all", "campus" and "parent" subdirectories
 * and only load plugins depending on which multisite we're in (assuming that site 1 is the parent site)
 *
 * Will execute any *.php file placed within the "all" folder EXCEPT FILES BEGINNING WITH AN UNDERSCORE.
 * This allows us to bundle "sample" files to help speed up development of a new site.
 *
 * @TODO: This piece of code should allow automatic loading of functionality based on the current "site" within a multisite.
 */

$dirs = array( 'all' );
//if ( 1 == get_current_blog_id() ){
//	$dirs[] = 'parent';
//} else {
//	$dirs[] = 'campus';
//}

foreach ( $dirs as $client_dir ){
	$plugin_dir = CLIENT_PLUGINS . $client_dir . DIRECTORY_SEPARATOR;

	foreach ( glob( $plugin_dir . '*.php' ) as $filename ){
		if( $plugin_dir . MU_INIT_FILE !== $filename && "_" !== substr( basename( $filename ), 0, 1 ) ) {
			require_once( $filename );
		}
	}

	foreach( glob( $plugin_dir . '*' ) as $subdir ){
		if ( is_dir( $subdir ) && "_" !== substr( basename( $subdir ), 0, 1 ) ){
			$main_class_file = $subdir . DIRECTORY_SEPARATOR . basename( $subdir ) . ".php";
			if ( file_exists( $main_class_file ) ){
				require_once( $main_class_file );
			}
		}
	}

	if ( file_exists( $plugin_dir . MU_INIT_FILE ) ) {
		require_once( $plugin_dir . MU_INIT_FILE );
	}
}


