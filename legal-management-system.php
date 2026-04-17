<?php
/**
 * Plugin Name: Legal Management System
 * Plugin URI:  https://example.com/legal-management-system
 * Description: A comprehensive legal case management system for lawyers.
 * Version:     1.0.0
 * Author:      Your Name
 * License:     GPL2
 * Text Domain: lms
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LMS_VERSION',    '1.0.0' );
define( 'LMS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'LMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once LMS_PLUGIN_DIR . 'includes/class-lms-db.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-clients.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-cases.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-documents.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-hearings.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-invoices.php';
require_once LMS_PLUGIN_DIR . 'includes/class-lms-admin.php';

register_activation_hook( __FILE__, array( 'LMS_DB', 'create_tables' ) );
register_deactivation_hook( __FILE__, array( 'LMS_DB', 'deactivate' ) );

function lms_init() {
    new LMS_Admin();
}
add_action( 'plugins_loaded', 'lms_init' );
