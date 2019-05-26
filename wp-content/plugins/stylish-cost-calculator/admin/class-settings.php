<?php
class Stylish_Cost_Calculator_Settings {
  public function __construct()
  {
    add_action( 'admin_init', array($this,'admin_init') );
    add_action( 'admin_menu', array($this,'admin_menu'), 90 );
    $this->license_return =get_option('scc_license_return');
  //  $sc_scheme = get_option('scc_color-scheme', 1);
  }

  function admin_init()
  {
    $scc_color_scheme = get_option( 'scc_color-scheme');
    $scc_currency = get_option( 'scc_currency');
    $scc_licensed = get_option( 'scc_licensed');
    $scc_fontsettings = get_option( 'scc_fontsettings');
    $scc_emailsender = get_option('scc_emailsender');
    $scc_sendername = get_option('scc_sendername');
    $scc_messageform = get_option('scc_messageform');
    if (! $scc_color_scheme) { add_option('scc_color-scheme', 1); }
    if (! $scc_currency) { add_option('scc_currency', 'USD'); }
    if (! $scc_licensed) { add_option('scc_licensed', '0'); }
    if (! $scc_fontsettings) { add_option('scc_fontsettings', ''); }
    if (! $scc_emailsender) { add_option('scc_emailsender', ''); }
    if (! $scc_sendername) { add_option('scc_sendername', ''); }
    if (! $scc_messageform ) { add_option('scc_messageform', "Hello <Customer>,\r\n\r\n Please find your attached quote. We appreciate your visiting.\r\n\r\n Thanks\r\n<sender>"); }

    register_setting('stylishpl_options','scc_license_key',array($this,'process_key'));
    wp_enqueue_style('scc-admin-style', SCC_URL. 'styles/main-static.css', array(), '3.1.1');
    wp_enqueue_style('gf-admin-style', SCC_URL. 'styles/scc-style_1.css', array(), '3.1.1');
  }

  function process_key($key)
  {
    if(isset($_REQUEST['activate'])){
      $license_return=$this->activate($key);
    }else if(isset($_REQUEST['deactivate'])){
      $license_return=$this->deactivate($key);
      //      update_option('scc_license_key',0);
    }
    update_option('scc_license_return',$license_return);
    return $key;
  }

  function checkbox($name, $options=array(),$current_value_arr=array())
  {
    ob_start();
    ?>
    <div class="checkbox">
      <?php foreach ($options as $value => $label):
        $checked='';
        if(in_array($value,$current_value_arr) != false){
          $checked=' checked="checked"';  //find the value
        }
        ?>
        <label>
          <input name="<?php echo $name . '[]'; ?>" type="checkbox" value="<?php echo $value; ?>" <?php echo $checked; ?>>
          <?php echo $label; ?>
        </label>
      <?php endforeach ?>
    </div>
    <?php

    $html=ob_get_clean();
    return $html;
  }

  function select($name, $options=array(),$current_value='')
  {
    ob_start();
    ?>
    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control">
      <?php foreach ($options as $value => $label):
        $selected='';
        if($current_value==$value){
          $selected=' selected="selected"';
        }
        ?>
        <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
      <?php endforeach ?>
    </select>
    <?php

    $html=ob_get_clean();
    return $html;
  }

  function option_page()
  {
    include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    $scc_licensed_value = get_option('scc_license_key');
    $scc_emailsender = get_option('scc_emailsender');
    $scc_sendername = get_option('scc_sendername');
    $scc_messageform = get_option('scc_messageform');
    $scc_licence_enable = get_option('scc_licensed');
    $scc_license_key = get_option('scc_license_key');
    if ('the license key is empty' == strtolower($scc_license_key)){
      $scc_license_key = '';
    }

    if (preg_replace('/\s/', '',$scc_messageform) == '' || empty($scc_messageform)) {
      update_option('scc_messageform', "Hello <Customer>,\r\n\r\n Please find your attached quote. We appreciate your visiting.\r\n\r\n Thanks\r\n<sender>");
      $scc_messageform ="Hello <Customer>,\r\n\r\n Please find your attached quote. We appreciate your visiting.\r\n\r\n Thanks\r\n<sender>";
    }

    $icon_class='dashicons-no';
    $icon_style='color:red;';
    $opt=get_option('scclk_opt');
    if(!empty($opt) && $opt==1){
      $icon_class='dashicons-yes';
      $icon_style='color:green;';
    }

    if( isset($_GET['settings-updated']) && !empty($opt)) {
      ?>
      <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.'); ?></strong></p>
      </div>
    <?php } ?>

      <form action="options.php" method="post" id="stylishpl-admin-options-form" >
        <?php settings_fields('stylishpl_options'); ?>
        <style type="text/css">
        .dashicons-no::before,
        .dashicons-yes::before {
          font-size: 25px;
        }

        .sccbutton {
          background: #314af3;
          border-color: #314af3 #314af3 #314af3;
          box-shadow: 2px 2px 2px #9a7070;
          color: #fff;
          text-decoration: none;
          text-shadow: 0 -1px 1px #314af3, 1px 0 1px #314af3, 0 1px 1px #314af3, -1px 0 1px #314af3;
          display: inline-block;
          text-decoration: none;
          font-size: 13px;
          line-height: 26px;
          height: 28px;
          margin: 0;
          padding: 0 10px 1px;
          cursor: pointer;
          border-width: 1px;
          border-style: solid;
          -webkit-appearance: none;
          border-radius: 3px;
          white-space: nowrap;
          box-sizing: border-box;
          width: 90px;
        }

        .sccsubtitle{
          font-size: 20px;
          font-weight: 400;
          margin: 0;
          padding: 9px 0 4px 0;
          line-height: 29px;
        }

        .sccsubdiv{
          height: 25px;
          width: 90px;
          display: flex;
          float: left;
          line-height: 35px;
        }
		.panel-group .panel {
		 max-width: 800px!important;
		}
        </style>
        <br/>
        <b><div class="sccsubtitle">License / Serial Code</div></b><br/>
        <div style="padding-left: 40px;height: 125px;width: 600px;">
          <label for="scc_license_key">License Key: </label><br/>
          <input type="password" id="scc_license_key" name="scc_license_key" value="<?php echo $scc_license_key ?>" />
          <span id='licensecrossicon' class="<?php echo $icon_class; ?> dashicons-before" style="<?php echo $icon_style; ?>"></span><br/>
          <br>
		  <p>
            <?php
            if($scc_licence_enable != "1"){
              ?>
                <input type="submit" name="activate" value="Activate" class="sccbutton" />
              <?php
            }
              else{
                ?>
                  <input type="submit" name="deactivate" value="Deactivate" class="button button-default" style=""/></p>
                <?php
            }
            if($this->license_return != "1"){
              echo $this->license_return;
            }
            ?>
          
          </div>
<br><br><hr/><br><br>
        </form>
        <b><div class="sccsubtitle" >Currency Setting</div></b><br/>
        <div style="padding-left: 40px;height: 145px;width: 600px;">
          <p><label for="scc_license_key">Currency: </label>
            <select name="currency_code" id="currency_code">
              <option value="">Select Currency</option>
              <option value="AUD">Australian Dollar</option>
              <option value="BRL">Brazilian Real </option>
              <option value="CAD">Canadian Dollar</option>
			  <option value="CNY">Chinese Yuan</option>
			  <option value="COP">Colombian Peso</option>
              <option value="CZK">Czech Koruna</option>
              <option value="DKK">Danish Krone</option>
              <option value="EUR">Euro</option>
              <option value="HKD">Hong Kong Dollar</option>
              <option value="HUF">Hungarian Forint </option>
              <option value="ILS">Israeli New Sheqel</option>
              <option value="JPY">Japanese Yen</option>
              <option value="MYR">Malaysian Ringgit</option>
              <option value="MXN">Mexican Peso</option>
              <option value="NOK">Norwegian Krone</option>
              <option value="NZD">New Zealand Dollar</option>
              <option value="PHP">Philippine Peso</option>
              <option value="PLN">Polish Zloty</option>
              <option value="GBP">Pound Sterling</option>
              <option value="SGD">Singapore Dollar</option>
              <option value="SEK">Swedish Krona</option>
              <option value="CHF">Swiss Franc</option>
              <option value="TWD">Taiwan New Dollar</option>
              <option value="THB">Thai Baht</option>
              <option value="TRY">Turkish Lira</option>
			  <option value="RUB">Russian Rubles</option>

			          <option value="USD" SELECTED="YES">U.S. Dollar</option>
            </select>
          </p>
          <input class="sccbutton" type="submit" name="Save" value="Save" onClick="saveSCCSettings()" />

   
          <div id="settingsuccs"></div>
        </div>
	<hr/><br>
        <b><div class="sccsubtitle">Email & Estimate Setting</div></b><br/>
        <div style="padding-left: 40px;height: 307px;width: 600px;">

          <div class="">
            <span></span>
          </div>
          <div class="sccsubdiv">
            <label for="scc_license_key">Sender Name</label>
          </div>
          <div class="" style="height:35px; display:flex;">
            <input type="text" id="sendername" value="<?php echo $scc_sendername; ?>" class="" style="width: 50%;"/>
          </div>

          <div class="sccsubdiv">
            <label for="scc_license_key">Sender e-Mail</label>
          </div>
          <div class="" style="height:35px; display:flex;">
            <input type="email" id="senderemail" value="<?php echo $scc_emailsender; ?>" class="" style="width: 50%;"/>
          </div>

          <div style="height: 36px;display: flex;align-items: center;">
            <label for="scc_license_key">Customer e-Mail Template</label>
          </div>
          <div class="" style="">
            <textarea rows="10" cols="75" id="messagetemplate"><?php echo $scc_messageform; ?>
            </textarea>
          </div>
          <div class="sccsubdiv" style="margin-top:20px;">
            <input class="sccbutton" type="submit" name="Save" value="Save" onClick="saveSCCEmailSetting()" /><hr/>
          </div>
        </div>
        <div id="savingemailresult" style="color:green;"></div>
      </div>

      <script>
      jQuery('#licensecrossicon').click(function() { jQuery('#scc_license_key').val(''); } );

      function saveSCCEmailSetting(){

        var sendername = jQuery('#sendername').val();
        var senderemail = jQuery('#senderemail').val();
        var messageform = jQuery('#messagetemplate').val();
        if(messageform.trim() == ""){
          messageform = messageform.trim();
        }
        if(senderemail ==''){

        }else{
          $fragment_refresh = {
            url: rt_vars.rt_urlajax,
            type: 'POST',
            data: { action: 'sccSaveEmailSettings',
            sender_name: sendername,
            sender_email: senderemail,
            message_form: messageform
          },
          success: function( data )
          { jQuery('#savingemailresult').html('Updaing email have been successfully changed');  }
        };
        jQuery.ajax( $fragment_refresh );
      }
    }

    function saveSCCSettings()
    {
      $fragment_refresh = {
        url: rt_vars.rt_urlajax,
        type: 'POST',
        data: { action: 'sccSaveSettings', currency_code: jQuery('#currency_code').val(), color_scheme: jQuery('#color_scheme').val(),
        scc_fonttype: jQuery('#scc_fonttype').val(), scc_colorscheme: jQuery('#scc_colorscheme').val(),
        sccfontsize: jQuery('#scc-font-size').val(), sccsizetype: jQuery('#scc-sizetype').val()
      },
      success: function( data )
      { jQuery('#settingsuccs').html('Settings have been successfully changed');  }
    };
    jQuery.ajax( $fragment_refresh );
  }
</script>
<?php

$html_1=ob_get_clean();
echo $html_1;
}

function include_license_settings(){
  $license_settings=SCC_DIR . '/license-settings.php';
  if(file_exists($license_settings)){
    require_once $license_settings;
    return true;
  }else{
    return 'cannot find the license-settings.php file in folder ' . SCC_DIR;
  }
}

function update_opt($opt){
  update_option('scclk_opt',$opt);
}

function activate($key){
  ob_start();
  if(!empty($key)){
    $license_data=$this->get_license_data($key,'slm_activate');
    if(isset($license_data->result)){
      if($license_data->result == 'success'){//Success was returned for the license activation
        // update_option('sample_license_key', '');
        $opt=get_object_vars($license_data);
        $this->update_opt($opt);
        update_option('scc_licensed',1);
        update_option('scclk_opt',1);
        return '<p style="color:green;"> Ok: This '.$license_data->message . '</p>';
      }
      if($license_data->result == 'error'){
        //Uncomment the followng line to see the message that returned from the license server
        return '<p style="color:red;"> Error: '.$license_data->message . '</p>';
      }
    }else{
      return $license_data;
    }
  }else{
    $this->update_opt('');
    return 'The license key is empty';
  }
  $_REQUEST['option_page'];
}
function deactivate($key){
  if(!empty($key)){
    $license_data=$this->get_license_data($key,'slm_deactivate');
    if(isset($license_data->result)){
      if($license_data->result == 'success'){//Success was returned for the license activation
        // update_option('sample_license_key', '');
        $opt=get_object_vars($license_data);
        $this->update_opt($opt);
        update_option('scc_licensed',0);
        update_option('scclk_opt',0);
        return '<p style="color:green;"> Ok: '.$license_data->message . '</p>';
      }
      else{
        //Uncomment the followng line to see the message that returned from the license server
        return '<p style="color:red;"> Error: '.$license_data->message . '</p>';
      }
    }else{
      return $license_data;
    }
  }else{
    $this->update_opt('');
    return 'The license key is empty';
  }

  $_REQUEST['option_page'];
}

function get_license_data($key,$action)
{
  $include_license=$this->include_license_settings();
  if($include_license !== true){
    return $include_license;
  }
  // API query parameters
  $api_params = array(
    'slm_action' => $action,
    'secret_key' => SCC_SPECIAL_SECRET_KEY,
    'license_key' => $key,
    'registered_domain' => $_SERVER['SERVER_NAME'],
    'item_reference' => urlencode(SCC_ITEM_REFERENCE),
    // 'secret_key' => YOUR_SPECIAL_SECRET_KEY,
    // 'license_key' => $license_key,
    // 'registered_domain' => $_SERVER['SERVER_NAME'],
    // 'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
  );

  // Send query to the license manager server
  $query = esc_url_raw(add_query_arg($api_params, SCC_LICENSE_SERVER_URL));
  $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
  // Check for error in the response
  if (is_wp_error($response)){
    return "Unexpected Error! The query returned with an error.";
  }
  // License data.
  $license_data = json_decode(wp_remote_retrieve_body($response));
  return $license_data;
}

//Add Help Content //
function help_page()
{
  wp_enqueue_script('scc-bootstrap-min');
  include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
  ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <h1 style="height:1px; margin:0px; padding:0px;"></h1>
    <h2>Help Menu w/ Videos</h2><br><br>
    <div class="panel-group" id="accordion1">
      <div class="panel panel-default">
        <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapseOne1">
          <h4 class="panel-title">Question #1: What's the difference between Pro and demo?</h4>

        </div>
        <div id="collapseOne1" class="panel-collapse collapse">
          <h4>Answer #1</h4>
          <div class="panel-body">The demo version only allows you to have 10 different elements. It also does not come with the email quote feature.
          </div>
        </div>
      </div>
	    <!-- Start -->
		  <div class="panel panel-default">
			<div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1,#accordion2,#accordion3,#accordion4,#accordion5,#accordion6" data-target="#collapseTwo1">
			  <h4 class="panel-title">Question #2: Change I change the front-end language?</h4>
			</div>
			<div id="collapseTwo1" class="panel-collapse collapse">
			  <h4>Answer #2</h4>
			  <div class="panel-body">
			  This feature should be available sometime in June 2019.
			  </div>
			</div>
		  </div>
		<!-- end -->

  
    
    </div>
  </div>

  <?php
}
// End Help Content
// Start Video Content
function video_page(){
  include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
  ?>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <h1 style="height:1px; margin:0px; padding:0px;"></h1>
  <h2>Stylish Cost Calculator: Video Tutorials </h2>
  <div class="youtube_video">
    <iframe width="920" height="520" src="https://www.youtube.com/embed/zB6kz2nKxoI/?rel=0" frameborder="0" allowfullscreen></iframe>
  </div>
  <?php
}
function admin_menu()
{
  add_submenu_page( 'scc-tabs', __( 'Help', 'stylishpl' ), __( 'Help', 'stylishpl' ), 'manage_options', 'stylish_cost_calculator_help', array( $this, 'help_page' ) );
  //	add_submenu_page( 'scc-tabs', __( 'Video Tutorials', 'stylishpl' ), __( 'Video Tutorials', 'stylishpl' ), 'manage_options', 'stylish_cost_calculator_video', array( $this, 'video_page' ) );
  add_submenu_page( 'scc-tabs', __( 'Settings', 'stylishpl' ), __( 'Settings / License', 'stylishpl' ), 'manage_options', 'stylish_cost_calculator_settings', array( $this, 'option_page' ) );
}
}
$stylish_cost_calculator_settings = new Stylish_Cost_Calculator_Settings();
?>
