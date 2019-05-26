<?php
    wp_enqueue_script('scc-bootstrap-min');
    wp_enqueue_script('scc-js-js');
    wp_enqueue_style('scc-bootstrap-min');
    include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    function getNumberofForms()
    {
      global $wpdb;
      $q = $wpdb->get_var("SELECT count(*) as allforms FROM {$wpdb->prefix}scc_forms where description='chewie'");
      return $q;
    }
    global $scc_googlefonts_var;
    // wp_enqueue_style( 'wp-color-picker' );
    // wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
?>
<!-- SCRIPTS TO TOGGLE FONT SETTINGS AND MORE -->
<script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    else {
        x.style.display = "none";
    }
  }
  function myFunction2() {
    var x = document.getElementById("myDIV2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<!-- END OF SCRIPTS TO TOGGLE FONT SETTINGS AND MORE -->

<div class="wrap scc_wrapper">

  <?php
  $opt=get_option('scc_licensed');
  $allForms = getNumberofForms();
  if($allForms >= 1 && (empty($opt) || $opt == 0) )
  {
    echo '<p class="free_version">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="http://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a></span> to buy the pro version.</p>';
  }

  else
  {
   ?>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $list_table = new Stylish_Cost_Calculator_Tabs_List();
    $list_table->prepare_items();
    $list_table->search_box( 'search', 's' );
    $list_table->disccay();
    ?>
  </form>
  <div class="col-md-12">
    <!-- <label class="scc_label col-xs-12 col-md-1" style="text-align: left;"><a class="scc_button" href="javascript:void(0)" onClick="resetFields()">RESET</a></label>-->
    <div style="clear: both;"></div>
    <br />
    <div id="adminsettingsid" data-calculator_id="" style="display: none;"></div>
    <div class="col-xs-12 col-md-12" style="margin-top:-30px;">
      <input type="text" class="col-md-2 input_pad" style="margin-left:15px;padding:11px;width:300px;" placeholder="Calculator name (mandatory)" id="costcalculatorname" value="" />
    </div>
  </div>
  </tr>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--- Save buttons start--->
  <div class="col-lg-12 col-md-10" style="padding-bottom:50px;padding-top:50px;">
    <label class="scc_label" style="text-align: left;"><a class="scc_button" href="javascript:void(0)" onClick="saveFields()">SAVE</a></label>
    <label class="scc_label" style="text-align: left;"><a class="scc_button" onclick="myFunction()">FONT SETTINGS</a></label>
    <label class="scc_label" style="text-align: left;"><a class="scc_button" onclick="myFunction2()">LOAD DEMO</a></label>

    <div style="display:none;" id="myDIV2" class="scc_label col-xs-12 col-md-2">
      <?php echo "<span><span style='margin-left:5px; ; padding: 10px; color: #555;line-height: 11px;float: left;'>";
      if (get_option('scc_licensed')) {
      echo "<select class=\"sccloaddemo\" onChange='loadExample(this)'><option value=\"\">[choose demo']</option><option value='0'>Venue Rental Template</option>";
      echo "</option><option value='1'>Website Designer Template</option>";
      echo "</option><option value='2'>Wedding Photographer Template</option>";
      echo "</option><option value='3'>Car Rental Template</option>";
      echo "</option><option value='4'>T-shirt Printing Template</option></select>";

      }
      else
       {
       echo "<span style='background: #e0e0e0; width: 100px; padding: 5px;'>[choose demo']</span>";
       }
      ?>

    </div>
  </div>
  <!--- Save buttons end--->
  <!-- Start of SAVE BUTTONS -->
  <div class="col-md-12" style="margin-top:-30px;margin-left:-4px;">
	<label class="scc_label" style="text-align: left;">
		<button type="button" id="myBtnVideosSCC" name="video_tutorial_btnSCC" value="" class="scc_button">VIDEO TUTORIAL</button>
	</label>
	<label class="scc_label" style="text-align: left;">
	<button type="button" id="myBtnSupportSCC" name="video_tutorial_btnSCC" value="" class="scc_button">CONTACT SUPPORT</button>
	</label>
 </div>
 <!-- End of SAVE BUTTONS -->
<!-- The Modal Videos Tutorials-->
<div id="myModalVideosSCC" class="modalvideosSCC" style="display:none;">
  <div class="modal-content-videosSCC">
    <span class="closevideoSCC">&times;</span>
    <p>
    <div style="padding-top:15px;text-align:center;font-size:40px;font-weight:bold;color:#314af3!important;">Video Tutorial</div>
    <div style="padding-top:20px;text-align:center;font-size:20px;color:#484848;">How to use Stylish Cost Calculator</div>
    </p>
    <br><hr><br>
    <p>
        <div style="text-align: center;">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" max-width="1120" height="630" type="text/html" src="https://www.youtube.com/embed/crIHB7Acxgs?autoplay=0&fs=1&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&vq=hd1080"></iframe>
        </div>
    </p>
  </div>
</div>
<!-- End of Modal Video Tutorials -->
<!-- The Modal Contact Support-->
<div id="myModalSupportSCC" class="modalsupportSCC">
  <div class="modal-content-supportSCC">
    <span class="closesupportSCC">&times;</span>
    <div style="padding-top:20px;text-align:center;font-size:40px;font-weight:bold;color:#314af3!important;">Contact Support</div>
    <div style="padding-top:20px;text-align:center;font-size:20px;color:#484848;">We're here to help!</div>
    <br><hr><br>
    <p>
        <div style="text-align: center;">
            <div style="text-align: left;width:100%;max-width:600px;padding-bottom:20px;font-size:16px;">
            Office hours are 9:00 - 21:00.<br>
            We will <strong>only answer</strong> your support ticket if you have tried the following troubleshooting steps first<br>
            1) Turned off all your plugins to make sure none is causing a conflict. <br>
            2) Have changed your theme to one of stock WordPress themes (Twenty Fifteen) to see if there’s
            a conflict with your Theme. Note: This will not erase any of your content or data on your current
            theme, everything will go back to normal after you switch it back.<Br>
            You can fill out the form below or click to message us on FaceBook.
            </div>
        </div>
         <!--<div class="row" style="margin-top:10px;">
            <div class="col-sm-4 col-md-3">
                <a href="https://www.facebook.com/designfulmultimedia/" target="_blank" class="button button-primary video_tutorial_btn">FaceBook Message</a>
            </div>
         </div>-->
		 <div class="col-sm-4 col-md-3">
                <a href="#" onclick="chatShow()" class="button button-primary video_tutorial_btn">
					Online Chat Support
				</a>
            </div>
        <br><br>
       <!-- <iframe src="https://designful.ca/spl-support/#splsupportid" scrolling="no" width="90%" height="400px" align="center" ></iframe> -->
    </p>
  </div>
</div>
<!-- End of Modal Video Tutorials -->


  <!-- START OF FONT SETTINGS AND COLORS -->

  <div style="display:none;" id="myDIV">
    <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:10px;margin-right:20px;">
      <table cellpadding="5px" cellspacing="5px">
        <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
          Title Font Settings
        </div><br>
        <tr>

          <td class="col-xs-12 col-md-5"><label class="scc_label">Size</label>
          </td>

          <td>
            <select name="titlepricefontsize" id="titlepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
              <option class="form-control servicepricefontsize" value="">Size</option>
              <?php
        for($n=1; $n<=100; $n++){
        if($n.'px'== '30px'){
          $select_ser = "selected";
          }
          else{
            $select_ser = "";
            }
        ?>
              <option class="form-control servicepricefontsize" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>>
                <?php echo $n ;?>px</option>
              <?php }
          ?>
            </select>

          </td>
        </tr>

        <tr>
          <!--<td class="col-xs-12 col-md-1"> <label class="scc_label">Admin Email:</label></td>
            <td class="col-xs-12 col-md-2"><input type="text" /></td> -->
          <td class="col-xs-12 col-md-3"><label class="scc_label">Font Type</label> </td>
          <td>
            <?php
            $allfonts = json_decode($scc_googlefonts_var->gf_get_local_fonts());
          ?>
            <select id='titlescc_fonttype' style="box-shadow: 1px 1px 1px #999; border: 0 none;">
              <?php
                   $fontIndex = 0;
                   foreach ($allfonts->items as $allfont) {
                       $selected = ('Open Sans' == $allfont->family) ? "selected=selected" : "";
                       ?>
              <option <?php echo $selected; ?> value="
                <?php echo $fontIndex;?>">
                <?php echo $allfont->family;?>
              </option>
              <?php $fontIndex++; } ?>
            </select>
          </td>
        </tr>
        <tr>
          <!--<td class="col-xs-12 col-md-1"><label class="scc_label">Email Subject</label></td>
            <td class="col-xs-12 col-md-2"><input type="text" /></td>-->
          <td class="col-xs-12 col-md-3"><label class="scc_label">Color</label> </td>
          <td>
            <input type="text" class="color-picker" id="titlecolorPicker" value="#000" /></td>
        </tr>
      </table>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:10px;margin-right:20px;">
      <table cellpadding="5px" cellspacing="5px">
        <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
          Service Font Settings
        </div><br>
        <tr>
          <!--<td class="col-xs-12 col-md-1"><label class="scc_label">Admin Email</label></td>
            <td class="col-xs-12 col-md-2"><input type="text" /></td> -->
          <td class="col-xs-12 col-md-4"><label class="scc_label">Size</label>
          </td>
          <td>
            <select name="servicepricefontsize" id="servicepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
              <option class="form-control servicepricefontsize" value="">Size</option>
              <?php
        for($n=1; $n<=100; $n++){
        if($n.'px'== '16px'){
          $select_ser = "selected";
          }
          else{
            $select_ser = "";
            }
        ?>
              <option class="form-control servicepricefontsize" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>>
                <?php echo $n ;?>px</option>
              <?php }
          ?>
            </select>
          </td>
        </tr>
        <tr>
          <!--<td class="col-xs-12 col-md-1"> <label class="scc_label">Admin Email:</label></td>
            <td class="col-xs-12 col-md-2"><input type="text" /></td> -->
          <td class="col-xs-12 col-md-4"><label class="scc_label">Font Type</label> </td>
          <td>
            <?php
            $allfonts = json_decode($scc_googlefonts_var->gf_get_local_fonts());
          ?>
            <select id='scc_fonttype' style="box-shadow: 1px 1px 1px #999; border: 0 none;">
              <?php
                   $fontIndex = 0;
                   foreach ($allfonts->items as $allfont) {
                       $selected = ('Open Sans' == $allfont->family) ? "selected=selected" : "";
                       ?>
              <option <?php echo $selected; ?> value="
                <?php echo $fontIndex;?>">
                <?php echo $allfont->family;?>
              </option>
              <?php $fontIndex++; } ?>
            </select>
          </td>
        </tr>
        <tr>
          <!--<td class="col-xs-12 col-md-1"><label class="scc_label">Email Subject</label></td>
            <td class="col-xs-12 col-md-2"><input type="text" /></td>-->
          <td class="col-xs-12 col-md-4"><label class="scc_label">Font Color</label> </td>
          <td>
            <input type="text" class="color-picker" id="colorPicker" value="#000" /></td>
        </tr>
      </table>
    </div>
    <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:10px;margin-right:20px;">
      <table cellpadding="5px" cellspacing="5px">
        <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
          Object Settings
        </div><br>
        <tr>
          <td class="col-xs-12 col-md-4"><label class="scc_label">Object Size</label>
          </td>
          <td>
            <select name="servicepricefontsize" id="objectservicepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
              <option class="form-control servicepricefontsize" value="">Size</option>
              <?php
        for($n=1; $n<=100; $n++){
        if($n.'px'== '50px') {
          $select_ser = "selected";
          }
          else{
            $select_ser = "";
            }
        ?>
              <option class="form-control servicepricefontsize" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>>
                <?php echo $n ;?>px</option>
              <?php }
          ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="col-xs-12 col-md-4"><label class="scc_label">Color</label> </td>
          <td>
            <input type="text" class="color-picker" id="objectcolorPicker" value="#000" /></td>
        </tr>
        <tr>
          <td class="col-xs-12 col-md-3"></td>
          <td> </td>
        </tr>
      </table>
    </div>
  </div>
  <!-- ******************************************************************************************** -->
  <script type="text/javascript">
    // jQuery(function($) {
    //   $('.color-picker').wpColorPicker();
    // });
  </script>
<?php include_once SCC_DIR . '/admin/main_body.php'; ?>
  <!--- ********************************************************************************************************************************* -->
  <?php } ?>
  <!-- JS for Video Tutorials BTN --->
<script>
// Get the modal
var modalvideoSCC = document.getElementById('myModalVideosSCC');

// Get the button that opens the modal
var btnvideoSCC = document.getElementById("myBtnVideosSCC");

// Get the <span> element that closes the modal
var spanvideoSCC = document.getElementsByClassName("closevideoSCC")[0];

// When the user clicks the button, open the modal
btnvideoSCC.onclick = function() {
    modalvideoSCC.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanvideoSCC.onclick = function() {
    modalvideoSCC.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalvideoSCC) {
        modalvideoSCC.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modalsupportSCC = document.getElementById('myModalSupportSCC');

// Get the button that opens the modal
var btnsupportSCC = document.getElementById("myBtnSupportSCC");

// Get the <span> element that closes the modal
var spansupportSCC = document.getElementsByClassName("closesupportSCC")[0];

// When the user clicks the button, open the modal
btnsupportSCC.onclick = function() {
    modalsupportSCC.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spansupportSCC.onclick = function() {
    modalsupportSCC.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalsupportSCC) {
        modalsupportSCC.style.display = "none";
    }
}
</script>
<!-- END of JS for Video Tutorials & Support BTN --->

<!--- TIDIO CUTSOM BUTTON CHAT HELP -->
<script>
function chatShow(e) {
tidioChatApi.method('popUpOpen');
}
</script>
<!--- TIDIO CHAT HELP -->
<!--- TIDIO CHAT HELP -->
<script src="//code.tidio.co/rjrinwxitmkczxakuxdvtzalnbxi1f1x.js"></script>
<!--- END TIDIO CHAT HELP -->
