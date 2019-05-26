<?php
class Stylish_Cost_Calculator_Diagnostic {
  public static function init()
  {}

  public function __construct()
  {
  //  add_action( 'admin_init', array($this,'admin_init') );
    add_action( 'admin_menu', array($this,'admin_menu'), 90 );
    $this->license_return =get_option('scc_license_return');
    add_action("wp_enqueue_scripts", "diagnostic_load");
  }

function diagnostic_load(){
  wp_enqueue_style('scc-admin-style', SCC_URL. 'styles/main-static.css', array(), '3.1.1');
  wp_enqueue_style('gf-admin-style', SCC_URL. 'styles/scc-style_1.css', array(), '3.1.1');
}

  function diagnostic_page()
  {
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    ?>
    <style>
    #border1 {
      border: 2px black;
      -moz-box-shadow: inset 1px 1px 10px #F0F0F0;
      border-radius: 10px;
      background-color: #F8F8F8;
      padding: 15px;
      margin-left: 25px;
      margin-bottom: 15px;
      box-shadow: 0px 0px;
      max-width: 300px;
      box-shadow: 1px 1px 5px gray;
    }

    .green_dot {
      height: 16px;
      width: 16px;
      background-color: green;
      border-radius: 50%;
      display: inline-block;
      margin-left:10px;
      margin-right:20px;
    }

    .red_dot {
      height: 16px;
      width: 16px;
      background-color: red;
      border-radius: 50%;
      display: inline-block;
      margin-left:10px;
      margin-right:20px;
    }

    .yellow_dot{
      height: 16px;
      width: 16px;
      background-color: orange;
      border-radius: 50%;
      display: inline-block;
      margin-left:10px;
      margin-right:20px;
    }
    </style>
    <?php

    global $wp_version;
    $test_char = "".DB_CHARSET;
    $php_version = phpversion();
    ob_start();
    phpinfo(INFO_MODULES);
    $contents = ob_get_clean();
    $moduleAvailable = strpos($contents, 'mod_security') !== false;
    $plugin_conflicted = 0;
    $theme_conflicted = 0;
    $theme = wp_get_theme();
    $spl_license_return = get_option('act_ser_conn_refused');
    $license_key_activated = get_option('spl_license_return');

    echo '<h1 style="padding-left:25px;padding-bottom:5px;padding-top:30px;font-weight:800px;"> Diagnostic </h1>';
    echo '<p style="padding-left:25px;padding-bottom:50px;font-weight:400px;"> Please action any items in red by emailing your admin or hosting company support. You may also try emailing us a screenshot to spl_support@designful.ca</h1>';


    // PHP VERSION HIGHER THAN 5.0
    if (version_compare($php_version, '5.5', '>=')) {
      echo '<div id="border1"><span class="green_dot"></span>  <span style="font-size:1em;font-weight:bold;">PHP Version:</span>';
      echo"  $php_version <br></div>";
    } else {
      echo '<div id="border1"><span class="red_dot"></span>  <span style="font-size:1em;font-weight:bold;">PHP Version:</span>';
      echo"  $php_version <br><BR>";
      echo "Change your PHP level in your cPanel, or ask your hosting comapny to do so. <br></div>";
    }
    // WP VERSION HIGHER THAN 5.0
    if (version_compare($wp_version, '5.0', '>=')) {
      // WordPress version is greater than 4.3
      echo '<div id="border1"><span class="green_dot"></span> <span style="font-size:1em;font-weight:bold;">WordPress Version:</span>';
      echo"  $wp_version</div>";
    } else {
      echo '<div id="border1"><span class="red_dot"></span> <span style="font-size:1em;font-weight:bold;">WordPress Version:</span>';
      echo"  $wp_version <br><br>  ";
      echo "Change upgrade to your core WP version the latest. Remeber to BACKUP first!<br></div>";
    }
    // MOD SECURITY IS OFF
    if ($moduleAvailable == NULL) {
      echo '<div id="border1"><span class="green_dot"></span> <span style="font-size:1em;font-weight:bold;">MOD Security:</span> Off </div> ';
    } else {
      echo '<div id="border1"><span class="red_dot"></span> <span style="font-size:1em;font-weight:bold;">MOD Security:</span>';
      echo"  $moduleAvailable <br> </div>";
    }
    // Check if any plugins are conflicted
    if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) {
      $plugin_conflicted = $plugin_conflicted + 1;
      $plugins_detected = "Page Builder by SiteOrigin";
    }
    // Check If beacer page builder Activated
    if ( is_plugin_active( 'beaver-builder-lite-version/fl-builder.php' ) ) {
      $plugin_conflicted = $plugin_conflicted + 1;
      $plugins_detected = "WordPress Page Builder � Beaver Builder";
    }
    // Check If wordfence Activated
    if ( is_plugin_active( 'wordfence/wordfence.php' ) ) {
      $plugin_conflicted = $plugin_conflicted + 1;
      $wordfence_detected = "Wordfence Security";
    }

    if ($plugin_conflicted == NULL) {
      echo '<div id="border1"><span class="green_dot"></span> <span style="font-size:1em;font-weight:bold;">Conflicted Plugins:</span> None </div>';
    } else {
      if($wordfence_detected == "Wordfence Security" && ($plugins_detected == "Page Builder by SiteOrigin" || $plugins_detected == "WordPress Page Builder � Beaver Builder")){
        echo '<div id="border1"><span class="yellow_dot"></span> <span style="font-size:1em;font-weight:bold;">Conflicted Plugins:</span>';
        echo" $plugin_conflicted<br><br>";
        echo "Warning: You�re using a page builder. Please make sure you�re using the correct container size and widget to add our shortcode to.</br>";
        echo "Warning: Detected WordFence plugin. You must whitelist our plugin.<br>";
        echo "</div>";
      }elseif($wordfence_detected == "Wordfence Security" && $plugins_detected == NULL){
        echo '<div id="border1"><span class="yellow_dot"></span> <span style="font-size:1em;font-weight:bold;">Conflicted Plugins:</span>';
        echo" $plugin_conflicted<br><Br>";
        echo "Warning: Detected WordFence plugin. You must whitelist our plugin.<br>";
        echo "</div>";
      }else{
        echo '<div id="border1"><span class="yellow_dot"></span> <span style="font-size:1em;font-weight:bold;">Conflicted Plugins:</span>';
        echo" $plugin_conflicted<br>";
        echo "Warning: You�re using a page builder. Please make sure you�re using the correct container size and widget to add our shortcode to.";
        echo "</div>";
      }
    }

    if ($spl_license_return == "connection refused" && $license_key_activated != 1) {
      echo '<div id="border1"><span class="red_dot"></span> <span style="font-size:1em;font-weight:bold;">Pingback to server:</span>';
      echo "Cannot ping our activation server. Ask hosting company to add our I.P to the whitelist. IP = 104.152.168.28";
      echo '</div>';
    }else{
      echo '<div id="border1"><span class="green_dot"></span> <span style="font-size:1em;font-weight:bold;">Pingback to server:</span> Successful';
      echo '</div>';
    }

    if ($test_char == "utf8mb4") {
      echo '<div id="border1"><span class="green_dot"></span> <span style="font-size:1em;font-weight:bold;">Charset:</span>';
      echo " $test_char";
      echo '</div>';
    }elseif($test_char == "utf8") {
      echo '<div id="border1"><span class="yellow_dot"></span> <span style="font-size:1em;font-weight:bold;">Charset:</span>';
      echo " $test_char";
      echo "<br><Br>Suggestion: You should edit the $DB_CHARSET variable in your wp_config.php file to utf8mb4";
      echo '</div>';
    }else{
      echo '<div id="border1"><span class="red_dot"></span> <span style="font-size:1em;font-weight:bold;">Charset:</span>';
      echo " $test_char";
      echo "<br><Br>Warning: You should edit the $DB_CHARSET variable in your wp_config.php file to utf8mb4";
      echo '</div>';
    }

    include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-footer.php';
  }

  function admin_menu()
  {
    add_submenu_page( 'scc-tabs', __( 'Diagnostic', 'stylishpl' ), __( 'Diagnostic', 'stylishpl' ), 'manage_options', 'stylish_cost_calculator_Diagnostic', array( $this, 'diagnostic_page' ) );
  }
}
$stylish_cost_calculator_Diagnostic = new Stylish_Cost_Calculator_Diagnostic();
?>
