<?php
if( is_admin() ) 
{
    GLOBAL $wpdb;
    $wp_prefix = $wpdb->prefix;
    // This includes the dbDelta function from WordPress.
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    if('0.0'==STYLISH_COST_CALCULATOR_VERSION ){
        //we my do some reset job here, like delete the table
    }
    update_option('stylish_cost_calculator_version', STYLISH_COST_CALCULATOR_VERSION);
}