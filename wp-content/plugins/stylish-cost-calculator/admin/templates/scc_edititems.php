<?php
global $scc_googlefonts_var;

wp_enqueue_script('scc-bootstrap-min');
wp_enqueue_script('scc-js-js');

wp_enqueue_style('scc-bootstrap-min');

wp_enqueue_style('scc-css-mobile');
wp_enqueue_style('scc-css-mobile-theme');

wp_enqueue_style('scc-bootstrapslider-css');
wp_enqueue_script('scc-bootstrapslider-js');
wp_enqueue_script('scc-scripts-js');

wp_enqueue_style('wp-color-picker');

include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';

// wp_enqueue_script('my-script-handle', plugins_url('my-script.js', __FILE__), array( 'wp-color-picker' ), false, true);

$parameters = json_decode(stripslashes($result_2->parameters));

//echo "<br>hello".stripslashes(stripslashes($allinputstoadd->formstored));

?>

<!-- SCRIPTS TO TOGGLE FONT SETTINGS AND MORE -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
-->
<script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
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
<!-- CAL NAME INPUT-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="col-xs-12 col-md-12">
  <input type="text" style="margin-left:28px;padding:11px;width:300px;" class="col-md-6 input_pad" id="costcalculatorname" placeholder="Enter the name of this calculator" value="<?php echo isset($allinputstoadd->formname) ? stripslashes($allinputstoadd->formname) : ''; ?>" />
</div>
<!-- END OF CAL NAME INPUT-->


<div class="wrap scc_wrapper">

 <!-- Start of SAVE BUTTONS -->
  <div class="col-md-12" style="padding-top:40px;margin-left:-20px;">
    <label class="scc_label" style="text-align: left;"><a class="scc_button" href="javascript:void(0)" onClick="saveFields()">SAVE</a></label>
    <label class="scc_label" style="text-align: left;"><a class="scc_button" onclick="myFunction()">FONT SETTINGS</a></label>
    <label class="scc_label" style="text-align: left;"><a class="scc_button" onclick="myFunction2()">EMBED TO PAGE</a></label>
    <div style="display:none;" id="myDIV2">
      <label class="col-xs-12 col-md-3" style="text-align: left;">
       <?php echo "";
       echo "<span style='margin-left:10px;margin-top:10px; '>Copy this shortcode to any of your pages: <span style='margin-left: 10px; background: #ddd; padding: 6px; color: #555;line-height: 11px;float: left;'><br>[scc_calculator type='text' idvalue='$id']</span></span>"; ?>
     </label>
   </div>
 </div>
 <!-- End of SAVE BUTTONS -->
  <!-- Start of SAVE BUTTONS -->
  <div class="col-md-12" style="padding-top:20px;margin-left:-20px;">
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
         <div class="row" style="margin-top:10px;">
            <!---<div class="col-sm-4 col-md-3">
                <a href="https://www.facebook.com/designfulmultimedia/" target="_blank" class="button button-primary video_tutorial_btn">FaceBook Message</a>
            </div>--->
			<div class="col-sm-4 col-md-3">
                <a href="#" onclick="chatShow()" class="button button-primary video_tutorial_btn">
					Online Chat Support
				</a>
            </div>
         </div>
        <br><br>
        <!--  <iframe src="https://designful.ca/spl-support/#splsupportid" scrolling="no" width="90%" height="400px" align="center" ></iframe>-->
    </p>
  </div>
</div>
<!-- End of Modal Video Tutorials -->

 <div style="clear: both;"></div><br />
 <?php if (array_key_exists('error', $_GET)): ?>
  <div class="notice notice-error"><p><?php echo $_GET['error']; ?></p></div>
<?php endif;
if (array_key_exists('success', $_GET)): ?>
  <div class="notice notice-success"><p><?php echo $_GET['success']; ?></p></div>
<?php endif;

$opt=get_option('scclk_opt');

?>

<form method="post">
  <input type="hidden" name="page" value="ttest_list_table">

    <?php
          /*$list_table = new Stylish_Cost_Calculator_Tabs_List();
          $list_table->prepare_items();
          $list_table->search_box( 'search', 's' );
          $list_table->disccay();*/
          ?>
        </form>

        <?php if (!isset($_GET['id'])) {
              echo "<div style='color: #a00;'>ERROR - ID is not available</div>";
              exit;
          } else {
           $form_id = $_GET['id'];
           if (!is_numeric($form_id)) {
               echo "<div style='color: #a00;'>ERROR - ID is not numeric</div>";
               exit;
           }
       }
          // print_r($parameters->fontType);   exit;
       ?>
       <div id="adminsettingsid" data-calculator_id="<?php echo $form_id; ?>" style="display: none;"></div>
       <br>
       <hr>
       <br>
       <div class="col-xs-12 col-md-12 col-lg-12">

                <!-- START OF FONT SETTINGS AND COLORS -->
                <div style="display:none;" id="myDIV">
                  <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:30px;margin-right:20px;">
                   <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
                     Title Font Settings
                   </div><br>
                   <div class="col-md-12" style="margin-top:20px;">
                    <label class="scc_label col-md-4">Font Size</label>
                    <select  class="col-md-4" name="titlepricefontsize" id="titlepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
                     <option class="form-control servicepricefontsize" value="">Size</option>
                     <?php
                     for ($n=10; $n<=70; $n++) {
                         if ($n.'px'== $parameters->titleServicepricefontsize) {
                             $select_ser = "selected";
                         } else {
                             $select_ser = "";
                         } ?>
                      <option class="form-control servicepricefontsize" value="<?php echo $n ; ?>px" <?php echo $select_ser; ?>><?php echo $n ; ?>px</option>
                    <?php
                     }
                    ?>
                  </select>
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                 <label class="scc_label col-xs-12 col-md-4">Title Font Type</label>
                 <?php
                 $allfonts = json_decode($scc_googlefonts_var->gf_get_local_fonts());
                 ?>
                 <select id='titlescc_fonttype' class="col-md-4" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
                  <?php
                  $fontIndex = 0;
                  foreach ($allfonts->items as $allfont) {
                      $selected = ($parameters->titleFontType == $fontIndex) ? "selected=selected" : "";
                      echo "<option ".$selected." value='".$fontIndex."'>". $allfont->family."</option>";
                      $fontIndex++;
                  }
                 //  $fontIndex++;
                 // }
                 ?>
                 </select>
               </div>
               <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;">
                <label class="scc_label col-xs-12 col-md-4" style="margin-bottom:5px;margin-bottom:5px;">Font Color</label>

                <input type="text" class="color-picker col-md-4" id="titlecolorPicker" value="<?php echo $parameters->titleColorPicker;?>" />

              </div>
            </div>
            <!--- END OF TITLE FONT STTINGS --->
            <!-- OLD SERVICE FONT --->
            <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:30px;margin-right:20px;">
             <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
               Service Font Settings
             </div><br>
             <div class="col-md-12" style="margin-top:20px;">
              <label class="scc_label col-md-4">Font Size</label>
              <select  name="servicepricefontsize" class="col-md-4" id="servicepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
                <option class="form-control servicepricefontsize" value="">Size</option>
                <?php
                for ($n=8; $n<=40; $n++) {
                    if ($n.'px'== $parameters->servicepricefontsize) {
                        $select_ser = "selected=selected";
                    } else {
                        $select_ser = "";
                    } ?>
                 <option class="form-control servicepricefontsize" value="<?php echo $n ; ?>px" <?php echo $select_ser; ?>><?php echo $n ; ?>px</option>
               <?php
                }
               ?>
             </select>
           </div>
           <div class="col-md-12" style="margin-top:20px;">
             <label class="scc_label col-md-4">Font Type</label> </td>
             <?php
             $allfonts = json_decode($scc_googlefonts_var->gf_get_local_fonts());
             ?>

             <select id='scc_fonttype' class="col-md-4" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
               <?php
               $fontIndex = 0;
               foreach ($allfonts->items as $allfont) {
                   $selected = ($fontIndex == $parameters->fontType) ? "selected=selected" : ""; ?>
                <option <?php echo $selected; ?> value="<?php echo $fontIndex; ?>"><?php echo $allfont->family; ?></option>
                <?php $fontIndex++;
               } ?>
              </select>
            </div>
            <div class="col-md-12" style="margin-top:20px;margin-bottom:20px;">
              <label class="scc_label col-md-4">Font Color</label>
              <input type="text" class="color-picker col-md-4" id="colorPicker" value="<?php echo $parameters->colorPicker;?>" />
            </div>
          </div>
          <!-- END OF SERVICE FONT SETTING -->
          <div class="col-xs-12 col-md-4 col-lg-4 addedFieldsStyle" style="margin-top:30px;"><table cellpadding="5px" cellspacing="5px">
            <div style="text-align:center;font-size:16px;font-size:16px;padding-bottom:10px;padding-top:10px;background-color:#D0D0D0;" class="col-xs-12 col-md-12">
             Object Settings
           </div><br>
           <tr>
                     <!--<td class="col-xs-12 col-md-1"><label class="scc_label">Admin Email</label></td>
                       <td class="col-xs-12 col-md-2"><input type="text" /></td> -->

                       <td class="col-xs-12 col-md-3"><label class="scc_label">Object Size</label>
                       </td>
                       <td>
                         <select  name="servicepricefontsize" id="objectservicepricefontsize" style="box-shadow: 1px 1px 1px #999; border: 0 none;">
                           <option class="form-control servicepricefontsize" value="">Size</option>
                           <?php
                           for ($n=1; $n<=100; $n++) {
                               if ($n.'px'== $parameters->objectServicepricefontsize) {
                                   $select_ser = "selected";
                               } else {
                                   $select_ser = "";
                               } ?>
                             <option class="form-control servicepricefontsize" value="<?php echo $n ; ?>px" <?php echo $select_ser; ?>><?php echo $n ; ?>px</option>
                           <?php
                           }
                           ?>
                         </select>

                       </td>
                     </tr>
                     <tr>
                     <!--<td class="col-xs-12 col-md-1"><label class="scc_label">Email Subject</label></td>

                       <td class="col-xs-12 col-md-2"><input type="text" /></td>-->
                       <td class="col-xs-12 col-md-3"><label class="scc_label">Object Color</label> </td> <td>

                         <input type="text" class="color-picker" id="objectcolorPicker" value="<?php echo $parameters->objectColorPicker ?>" /></td>

                       </tr>
                       <tr>
                     <!--<td class="col-xs-12 col-md-1"> <label class="scc_label">Admin Email:</label></td>
                       <td class="col-xs-12 col-md-2"><input type="text" /></td> -->
                       <td class="col-xs-12 col-md-3 SCC_td"></td>
                       <td > </td>

                     </tr>

                   </table></div>
                 </div>
                 <!-- END OF ALL FONT SETTINGS AND COLORS -->

                 <script type="text/javascript">
                  //  jQuery(function($){
                  //   $('.color-picker').wpColorPicker();
                  // });
                </script>
                <!-- **************************************************************************************************** -->

<?php include_once SCC_DIR . '/admin/main_body.php'; ?>

<script>
jQuery( document ).ready(function() {
      <?php
        $dat = json_decode(stripslashes(stripslashes($allinputstoadd->formstored)));//stripslashes may cause issues
        $i = 0;
        //$dat = is_array($dat) ? $dat : array($dat);
        $ii = count($dat);
        foreach ($dat as $fild) {
            ?>
            var ele = 0;
            console.log('<?php echo ($fild->name); ?>');
            var theOpt = jQuery('#inputtoadd').html();
            jQuery('#allinputstoadd').append( theOpt );
            var ths ='#allinputstoadd .addedFieldsStyle:eq(<?php echo $i; ?>)';
            var xelement = parseInt(<?php echo $i; ?>);
            jQuery(ths).find('.sectiontitle').val('<?php echo $fild->name; ?>');
            jQuery(ths).find('.sectionDescription').val('<?php echo str_replace("\n", '\r\n', $fild->desc); ?>');
            jQuery(ths).attr('id', 'Sccvo_<?php echo $i; ?>');

            <?php
            if (!empty($fild->value)) {
                foreach ($fild->value as $field) {
                    ?>
                 addAnotherElement1(ths);
                  ele++;
                  <?php
        //          $sval = $field->Nooptions;
                  if(empty($field->minmax)){
                    //$slval = $sval->min_max;
                    ?>
                    jQuery(ths).find('.inputoption_slidchk:last').prop('checked', false);
                    <?php
                  }
                  else {
                    ?>
                    console.log(<?php echo json_encode($field->minmax); ?>);
                    jQuery(ths).find('.inputoption_slidchk:last').prop('checked', true);
                    jQuery(ths).find('.selslideropt_3:eq(<?php echo $field->subsection ?>)').slideToggle();
                    <?php foreach($field->minmax as $slval)
                    {
                      ?>
                      var No = <?php echo $slval->No; ?>;
                      if(No != 0) {
                                              console.log(<?php echo json_encode($slval->value1); ?>);
                        jQuery(ths).find('.selslideropt_3:last').find('.price_table:last').last().append('<tr><th ><input type="number" value="" class="input_pad sliderinputoption scc_input"  style="width: 100%;"align="center" disabled/></th><th ><input type="number" value="" class="input_pad sliderinputoption_2 scc_input"  style="width: 100%;"align="center"/></th><th ><input type="number" min=0 class="input_pad sliderinputoption_5 scc_input" value=""  style="width: 100%;"align="center"/></th><th><a href="javascript:void(0)" class="fa material-icons" onClick="remove_row(this)" style="font-size: 15px;">cancel</a></th></tr>');
                      }
                      jQuery(ths).find('.selslideropt_3:last').find('.sliderinputoption_T:last').val(<?php echo json_encode($slval->title); ?>);
                      jQuery(ths).find('.selslideropt_3:last').find('.sliderinputoption:eq('+No+')').val(<?php echo json_encode($slval->name); ?>);
                      jQuery(ths).find('.selslideropt_3:last').find('.sliderinputoption_2:eq('+No+')').val(<?php echo json_encode($slval->value1); ?>);
                      jQuery(ths).find('.selslideropt_3:last').find('.sliderinputoption_5:eq('+No+')').val(<?php echo json_encode($slval->value2); ?>);

                    <?php } ?>

                    jQuery(ths).find('.fieldDatatoAdd').find('.slidoption_3:eq(<?php echo $field->subsection ?>)').val(<?php echo $field->step; ?>);
                    jQuery(ths).find('.fieldDatatoAdd').find('.slidoption_4:eq(<?php echo $field->subsection ?>)').val(<?php echo $field->defaultValue; ?>);
                  <?php
                    }
                  foreach ($field->Nooptions as $x) {
                      ?>
                  if (jQuery(ths).find('.getfieldoptionx').get() == "") {
                     var theOpt = jQuery('#form-line').html();
                     jQuery(ths).find('.form-line').append(theOpt);
                     ele++;
                  }
                  var tmpp = jQuery(<?php echo $x->type; ?>).attr('id');
                  AddSection(ths,<?php echo $x->element; ?>,tmpp);
                  <?php foreach ($x->value as $val) {
                          ?>
                    UpdateSection(ths, tmpp, <?php echo json_encode($val->title); ?>,<?php echo json_encode($val->name); ?>,<?php echo $val->value1; ?>,<?php echo json_encode($val->value2); ?>, <?php echo $x->length; ?>,<?php echo $val->No; ?>,ele)
                  <?php
                      }
                  }
                }
            }
            $i++;
        }
          ?>
      jQuery('#allinputstoadd .down:last').css("display", "none");
      jQuery('#allinputstoadd .up:first').css("display", "none");
      jQuery('#allinputstoadd .down').not(':last').css("display", "block");
      jQuery('#allinputstoadd .up').not(':first').css("display", "block");
 });
function AddSection($this, section, tpe) {
   switch (tpe) {
     case "titledescdiv":
     // fieldOpt2 = jQuery('#titledescdiv').html();
     // break;
     // case "AsliderOption":
     // fieldOpt2 = jQuery('#AsliderOption').html().replace(/XXYYXX/g, 1);
     // break;
     case "switchoption":
     fieldOpt2 = jQuery('#switchoption').html().replace(/XXYYXX/g, 1);
     break;
     case "selectoption":
     fieldOpt2 = jQuery('#selectoption').html().replace(/XXYYXX/g, 1);
     break;
     default:
     fieldOpt2 = jQuery('#titledescdiv').html();
   }
   jQuery($this).find('.BodyOption:last').html(fieldOpt2);
 }
function UpdateSection($this, tpe, title, name, value1, value2, length, No,ele) {
     switch (tpe) {
       case "titledescdiv":
         jQuery($this).find('.BodyOption:last').find('.titleinputoption:eq('+No+')').val(name);
         jQuery($this).find('.BodyOption:last').find('.descinputoption').val(value1);
         break;
       case "AsliderOption":
         jQuery($this).find('.BodyOption:last').find('.sliderinputoption_T:eq('+No+')').val(title);
         jQuery($this).find('.BodyOption:last').find('.sliderinputoption:eq('+No+')').val(name);
         jQuery($this).find('.BodyOption:last').find('.sliderinputoption_2:eq('+No+')').val(value1);
         jQuery($this).find('.BodyOption:last').find('.sliderinputoption_5:eq('+No+')').val(value2);
         if((length - No) > 1) {
           jQuery($this).find('.BodyOption:last').find('.price_table:last').last().append('<tr><th ><input type="number" value="" class="input_pad sliderinputoption"  style="width: 100%;"align="center" disabled/></th><th ><input type="number" value="" class="input_pad sliderinputoption_2"  style="width: 100%;"align="center"/></th><th ><input type="number" min=0 class="input_pad sliderinputoption_5" value=""  style="width: 100%;"align="center"/></th><th><a href="javascript:void(0)" class="fa material-icons" onClick="remove_row(this)" style="font-size: 15px;">cancel</a></th></tr>');
         }
         break;
       case "switchoption":
         jQuery($this).find('.BodyOption:last').find('.switchinputoption:eq('+No+')').val(name);
         jQuery($this).find('.BodyOption:last').find('.switchinputoption_2:eq('+No+')').val(value1);
         jQuery($this).find('.BodyOption:last').find('.fieldFormat:eq('+No+')').val(value2);
         if((length - No) > 1) {
           jQuery($this).find('.BodyOption:last').find('.switchoption_2:last').append(jQuery('#switchoption .switchoption_2').html().replace(/XXYYXX/g, ((No + 2 ) + 1)));
          }
         break;
       case "selectoption":
         jQuery($this).find('.BodyOption:last').find('.inputoption_title:eq('+No+')').val(title);
         jQuery($this).find('.BodyOption:last').find('.inputoption:eq('+No+')').val(name);
         jQuery($this).find('.BodyOption:last').find('.inputoption_2:eq('+No+')').val(value1);
         jQuery($this).find('.BodyOption:last').find('.inputoption_desc:eq('+No+')').val(value2);
         if((length - No) > 1) {
           jQuery($this).find('.BodyOption:last').find('.content .selectoption_2:last').append(jQuery('#selectoption .selectoption_2').html().replace(/XXYYXX/g, (No + 2)));
         }
         break;
       default:
        fieldOpt2 = jQuery('#titledescdiv:eq('+No+')').html();
     }
}
function renderSliderInputs($this, val,no) {

   jQuery($this).find('.fieldDatatoAdd').find('.slidoption_3:eq('+no+')').val(step);
   jQuery($this).find('.fieldDatatoAdd').find('.slidoption_4:eq('+no+')').val(sliderdefault);
 }

</script>

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
