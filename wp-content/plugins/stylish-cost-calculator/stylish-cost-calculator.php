<?php
/*
Plugin Name: Stylish Cost Calculator
Plugin URI:  http://designful.ca/apps/stylish-cost-calculator-wordpress/
Description: A Stylish Cost Calculator / Price Estimate Form for your site.
Version:     3.0
Author:      Designful
Author URI:  http://designful.ca
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: scc
*/

define('STYLISH_COST_CALCULATOR_VERSION', '3.0');
define('SCC_URL', plugin_dir_url( __FILE__ ));
define('SCC_DIR', dirname( __FILE__ ));

class scc_class_install
{
  static function do_install_scc() //create the table used by the component if it does not exist
  {
    global $wpdb;
            $wpdb->hide_errors();
            $collate = '';
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            if ( $wpdb->has_cap( 'collation' ) ) {
                        if( ! empty($wpdb->charset ) )
                                $collate .= "DEFAULT CHARACTER SET $wpdb->charset";
                        if( ! empty($wpdb->collate ) )
                                $collate .= " COLLATE $wpdb->collate";
            }
                $scctables = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}scc_forms` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `formname` varchar(255) NOT NULL,
                `description` text NOT NULL,
                `ajaxform` text NOT NULL,
                `formstored` text NOT NULL
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
                  dbDelta( $scctables);

                    $scctables = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}scc_form_parameters` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `form_id` int(11) NOT NULL,
                  `parameters` text NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
                    dbDelta( $scctables);
        }
        static function createInstall()
        {
            scc_class_install::do_install_scc();
        }
        static function createUNInstall()
        {
            // global $wpdb;
            // $table_name = $wpdb->prefix . 'scc_form_parameters';
            // $sql = "DROP TABLE IF EXISTS $table_name";
            // $wpdb->query($sql);
            //
            // $table_name = $wpdb->prefix . 'scc_forms';
            // $sql = "DROP TABLE IF EXISTS $table_name";
            // $wpdb->query($sql);
        }
}
register_activation_hook(__FILE__, array( 'scc_class_install', 'createInstall' ) );
register_deactivation_hook(__FILE__, array( 'scc_class_install', 'createUNInstall' ));

function scc_loadPlugin_textdomain()
{
    load_plugin_textdomain( 'scc', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'scc_loadPlugin_textdomain' );

function scc_remove_slash_quotes($string){
    $string=stripslashes($string);
    $string=str_replace('\\\\','',$string);
    $string=str_replace("\\'","'",$string);
    $string=str_replace('\\"','"',$string);
    $string=htmlentities($string);
    return $string;
}//end want_more_lists()

//Check SiteOrigin Plugin active or not
function scc_custom_admin_notice(){ }
add_action( 'admin_notices', 'scc_custom_admin_notice' );
//End

add_action( 'wp_enqueue_scripts', 'scc_js_css_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'scc_js_css_enqueue_scripts' );

 require_once SCC_DIR . '/wp-google-fonts/google-fonts.php';
 require_once SCC_DIR . '/admin/tabs/tabs-db-functions.php';
 require_once SCC_DIR . '/admin/tabs/serversettings142.php';
 require_once SCC_DIR . '/shortcodes/costcalculator.php';
 require_once SCC_DIR . '/stylish-cost-ajax.php';

if ( is_admin() )
{
     // We are in admin mode
    $scc_installed = get_option('stylish_cost_calculator_version');
    if( $scc_installed != STYLISH_COST_CALCULATOR_VERSION ) {
        include_once( dirname( __FILE__ ) . '/scc-install.php' );
    }
     require_once( dirname(__FILE__).'/admin/admin.php' );
}

class Stylish_Cost_Calculator
{
    public function __construct() {
        add_action( 'init', array($this,'init') );
        register_activation_hook( __FILE__, array($this,'activation'));
        register_deactivation_hook( __FILE__, array($this,'deactivation'));
    }
    function init()
    {

    }
    function activation() { }
    function deactivation() { }
}
$stylish_cost_calculator = new Stylish_Cost_Calculator();

function scc_js_css_enqueue_scripts($hook)
{
    wp_register_script('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_register_style('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/css/bootstrap.min.css');

    wp_register_script('scc-bootstrapslider-js', SCC_URL . 'assets/lib/bootstrap-slider/js/bootstrap-slider.js', array('jquery'), '1.0', true);
    wp_register_style('scc-bootstrapslider-css', SCC_URL . 'assets/lib/bootstrap-slider/css/bootstrap-slider.css');

    wp_register_style('scc-dropbox', SCC_URL  . 'styles/msdropdown/dd.css', array(), '1.0.3');
    wp_enqueue_script('scc-bootstrap-min');
    wp_enqueue_style('scc-bootstrap-min');
    wp_enqueue_script('scc-bootstrapslider-js');
    wp_enqueue_style('scc-bootstrapslider-css');

    //// Style /////
    wp_register_style('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/css/bootstrap.min.css');
    wp_enqueue_style('scc-bootstrap-min');
    wp_register_style('scc-bootstrapslider-css', SCC_URL . 'assets/lib/bootstrap-slider/css/bootstrap-slider.css');
    wp_enqueue_style('scc-bootstrapslider-css');
    wp_register_style('scc-admin-style', SCC_URL  . 'styles/main-static.css', array(), '3.1.1');
    wp_enqueue_style('scc-admin-style');
    wp_register_style('scc-checkbox1', SCC_URL  . 'styles/checkboxes/customcheckbox.css', array(), '3.1.1');
    wp_enqueue_style('scc-checkbox1');
    wp_register_style('scc-checkbox2', SCC_URL  . 'styles/checkboxes/customradio.css', array(), '3.1.1');
    wp_enqueue_style('scc-checkbox2');
    wp_register_style('scc-checkbox3', SCC_URL  . 'styles/checkboxes/checkboxstyles.css', array(), '3.1.1');
    wp_enqueue_style('scc-checkbox3');
    wp_register_style('scc-dropbox', SCC_URL  . 'styles/msdropdown/dd.css', array(), '1.0.3');
    wp_enqueue_style('scc-dropbox');
    wp_register_style('gf-admin-style', SCC_URL  . 'styles/scc-style_1.css', array(), '3.1.1');
    wp_enqueue_style('gf-admin-style');
    wp_register_style('pretty-checkbx', 'https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css');
    wp_enqueue_style('pretty-checkbx');

    //// Script /////
    wp_register_script('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('scc-bootstrap-min');
    wp_register_script('scc-bootstrapslider-js', SCC_URL . 'assets/lib/bootstrap-slider/js/bootstrap-slider.js', array('jquery'), '4.4', true);
    wp_enqueue_script('scc-bootstrapslider-js');
    wp_register_script('scc-js-js', SCC_URL . 'assets/js/scc.js', array('jquery'), '2.77', true);
    wp_enqueue_script('scc-js-js');
    wp_register_script('html2canvas-js', SCC_URL . 'assets/js/html2canvas.js');
    wp_enqueue_script('html2canvas-js');
    wp_register_script('jspdf-debug-js', SCC_URL . 'assets/js/jspdf.debug.js');
    wp_enqueue_script('jspdf-debug-js');
    wp_register_script('scc-js-js_2', SCC_URL . 'assets/js/jquery.dd.min.js', array('jquery'), '1.2', true);
    wp_enqueue_script('scc-js-js_2');

    $sc_scheme = get_option('scc_color-scheme', 1);
}
