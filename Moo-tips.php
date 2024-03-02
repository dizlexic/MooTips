<?php

/*
Plugin Name: Moo Tips
Plugin URI: https://mooresolutions.io/wp/moo-tips
Description: A brief description of the Plugin.
Version: 1.0
Author: Daniel Moore
Author URI: https://mooresolutions.io
License: A "Slug" license name e.g. GPL2
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define the plugin path
define( 'MOO_TIPS_PATH', plugin_dir_path( __FILE__ ) );

// Define the plugin URL
define( 'MOO_TIPS_URL', plugin_dir_url( __FILE__ ) );

// Define the plugin basename
define( 'MOO_TIPS_BASENAME', plugin_basename( __FILE__ ) );

// Define the plugin version
const MOO_TIPS_VERSION = '1.0';

// Define the plugin file
const MOO_TIPS_FILE = __FILE__;

// Define the plugin name
const MOO_TIPS_NAME = 'Moo Tips';

// Define the plugin slug
const MOO_TIPS_SLUG = 'moo-tips';

// Define the plugin text domain
const MOO_TIPS_TEXT_DOMAIN = 'moo-tips';

// Instantiate the main plugin class
new \includes\MooTips();

// Instantiate the main plugin admin class
new \admin\MooTipsAdmin();
