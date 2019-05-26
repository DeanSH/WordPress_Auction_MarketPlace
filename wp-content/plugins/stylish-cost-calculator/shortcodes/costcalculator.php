<?php
if (!is_admin()) {
}
function callback($buffer)
{
  return $buffer;   // replace all the apples with oranges
}
require_once SCC_DIR . '/wp-google-fonts/google-fonts.php';
global $scc_googlefonts_var;

class scc_item_handler
{
  public static function init()
  {
    add_shortcode('scc_stylish_item', array( __CLASS__, 'handle_stylish_item' ));
    add_shortcode('scc_calculator', array( __CLASS__, 'create_stylish_calculator' ));
  }

  public static function create_stylish_calculator($atts, $content)
  {
    extract(shortcode_atts(array( 'idvalue' => '' ), $atts, 'bt_cc_item'));
    if (!is_numeric($idvalue)) {
      echo "ERROR - id does not exist";
      die();
    }

    global $wpdb;
    global $scc_googlefonts_var;
    $q = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}scc_forms WHERE id = %d", $idvalue);
    $result = $wpdb->get_row($q);
    $q = $wpdb->prepare("SELECT parameters FROM {$wpdb->prefix}scc_form_parameters WHERE form_id = %d", $idvalue);
    $result_2 = $wpdb->get_row($q);
    $result_2 = json_decode(stripslashes($result_2->parameters));
    $allfonts = json_decode($scc_googlefonts_var->gf_get_local_fonts());
    $allfonts = $allfonts->items;
    $fontUsed = $allfonts[$result_2->fontType];
    $fonts[0]['kind'] = $fontUsed->kind;
    $fonts[0]['family'] = $fontUsed->family;
    $fonts[0]['variants'] = $fontUsed->variants;
    $fonts[0]['subsets'] = $fontUsed->subsets;
    $fontUsed2 = $allfonts[$result_2->titleFontType];
    $fonts[1]['kind'] = $fontUsed2->kind;
    $fonts[1]['family'] = $fontUsed2->family;
    $fonts[1]['variants'] = $fontUsed2->variants;
    $fonts[1]['subsets'] = $fontUsed2->subsets;
    $scc_googlefonts_var->style_late($fonts);//load google fonts css
    ob_start(); ?>

    <style>
    .scc_header_dash_<?php echo $idvalue; ?>{
      content: ' ';
      clear: both;
      width: 100%;
      display: block;
      margin-bottom:20px;
      border-bottom: 3px solid <?php echo $result_2->titleColorPicker; ?> ;
    }
    .dd .ddTitle .ddTitleText img
    {
      -webkit-box-shadow: 5px 0 0 <?php echo $result_2->objectColorPicker; ?> inset, 0 2px 10px rgba(0,0,0,.2);
    }
    .scc_font_<?php echo $idvalue; ?>{
      font-family: <?php echo $fontUsed->family; ?> !important;
      color: <?php echo $result_2->titleColorPicker; ?> !important;
      font-size: <?php echo $result_2->servicepricefontsize; ?> !important;
      font-weight: normal;
    }
    .scc_fonttitle_<?php echo $idvalue; ?>{
      font-family: <?php echo $fontUsed2->family; ?> !important;
      color: <?php echo $result_2->titleColorPicker; ?> !important;
      font-size: <?php echo $result_2->titleServicepricefontsize; ?> !important;
      padding-top:40px;
      margin-bottom:10px;
    }
    .scc_fontDesc_<?php echo $idvalue; ?>{
      font-family: <?php echo $fontUsed2->family; ?>;
      color: <?php echo $result_2->titleColorPicker; ?> !important;
      padding-bottom:20px;
    }
    /* .can-toggle.demo-rebrand-2 label .can-toggle__switch_<?php echo $idvalue; ?> {
    height: <?php echo (int)$result_2->objectServicepricefontsize -1; ?>px !important;
    flex: 0 0 120px;
    border-radius: 60px;
  }
  .can-toggle.demo-rebrand-2 label .can-toggle__switch_<?php echo $idvalue; ?>:after {
  top: 1px;
  left: 2px;
  border-radius: 30px;
  width: 58px;
  line-height: <?php echo (int)$result_2->objectServicepricefontsize - 3; ?>px !important;
  font-size: 13px;
}
.can-toggle.demo-rebrand-2 label .can-toggle__switch_<?php echo $idvalue; ?>:before {
left: 60px;
font-size: 13px;
line-height: <?php echo (int)$result_2->objectServicepricefontsize -3; ?>px !important;
width: 60px;
padding: 3px 12px;
} */
/***********************************************************************/
/* .can-toggle label .can-toggle__switch_<?php echo $idvalue; ?> {
height: <?php echo (int)$result_2->objectServicepricefontsize -2; ?>px !important;
flex: 0 0 134px;
border-radius: 4px;
}
.can-toggle label .can-toggle__switch_<?php echo $idvalue; ?>:before {
left: 67px;
font-size: 12px;
line-height: <?php echo (int)$result_2->objectServicepricefontsize -4; ?>px !important;
width: 67px;
padding: 3px 12px;
}
.can-toggle label .can-toggle__switch_<?php echo $idvalue; ?>:after {
top: 2px;
left: 2px;
border-radius: 2px;
width: 65px;
line-height: <?php echo (int)$result_2->objectServicepricefontsize -4; ?>px !important;
font-size: 12px;
} */
.slider-handle_<?php echo $idvalue; ?>{
  background: <?php echo $result_2->objectColorPicker; ?>;
  /* height: <?php echo $result_2->objectServicepricefontsize; ?>;
  width: <?php echo $result_2->objectServicepricefontsize; ?>;
  top: -<?php echo (int)$result_2->objectServicepricefontsize * 0.3; ?>px;*/
  height: 30px;
  width: 30px;
  margin-top: 2px;
}
.totalPrice_<?php echo $idvalue; ?>{
  background: <?php echo $result_2->objectColorPicker; ?> !important;
 margin-top: -45px;
  color: #fff;
  /* border-radius: 80px; */
  font-size: 1.2em;
  text-align: center;
  display: flex;
  justify-content: left;
  align-items: left;
  height: 100%;
  padding-left: 10px!important;
  padding: 10px;
  box-shadow: 3px 2px 3px 0px #d8d8d2;
}
.printTable{
  background: <?php echo $result_2->objectColorPicker; ?> !important;
  color: #fff;
  border-radius: 30px;
  font-size: 14px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
 /* height: 100%;*/
  padding: 7px;
  margin: 5px 5px 5px 5px;
  /* box-shadow: 3px 2px 3px 0px #d8d8d2; */
}
.pretty input:checked~.state.p-success label:after, .pretty.p-toggle .state.p-success label:after{
  background-color: <?php echo $result_2->objectColorPicker; ?> !important;
}
.slider .tooltip-inner {
  padding: 0px 2px;
  color: white; /*<?php echo $result_2->objectColorPicker; ?>; */
  /* //line-height: <?php echo (int)$result_2->objectServicepricefontsize -4; ?>px !important; */
  margin-top: 39px;
  margin-right: -10px;
  background-color: transparent;
}
.slider-selection {
  position: absolute;
  background-image: -webkit-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
  background-image: -o-linear-gradient(top, #f9f9f9 0%, #f5f5f5 100%);
  background-image: linear-gradient(to bottom, <?php echo $result_2->objectColorPicker; ?> 0%, #f5f5f5 100%);
}
.slider.slider-horizontal .slider-track {
  height: 8px;
  width: 100%;
  margin-top: -1px;
  top: 50%;
  left: 0;
}
.scc_wrapper .tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: none;
}
.container_scccheck_<?php echo $idvalue; ?> input:checked ~ .checkmark {
  background-color: <?php echo $result_2->objectColorPicker; ?>;
}
.container_sccradio_<?php echo $idvalue; ?> input:checked ~ .checkmark {
  background-color: <?php echo $result_2->objectColorPicker; ?>;
}

.scchidenmodal {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transform: scale(1.1);
  transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 1rem 1.5rem;
  width: 24rem;
  border-radius: 0.5rem;
}
.close-button {
  float: right;
  width: 1.5rem;
  line-height: 1.5rem;
  text-align: center;
  cursor: pointer;
  border-radius: 0.25rem;
  background-color: lightgray;
}
.close-button:hover {
  background-color: darkgray;
}
.sccshowmodal {
  opacity: 1;
  visibility: visible;
  transform: scale(1.0);
  transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}

</style>

<script>
var modal = document.querySelector("#css_modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
  jQuery(modal).attr("class", "sccshowmodal");
}
function CloseModal() {
  jQuery(modal).attr("class", "scchidenmodal");
}
function SCCOpenModal(){
  jQuery('.hover_bkgr_fricctableprice').show();
  jQuery('#sccprinterid').attr('style','display:none !important');
  jQuery('#sccemailid').show();
}
function ClosePopup_scc2(){
  jQuery('.hover_bkgr_fricctableprice').hide();
}
function SCCPrintModal(){
  jQuery('.hover_bkgr_fricctableprice').show();
  jQuery('#sccprinterid').show();
  jQuery('#sccemailid').hide();
}
function ClosePrintPopup(){
  jQuery('.hover_bkgr_friccprintprice').hide();
}
</script>
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<div style="clear: both;"></div>
<div id='scc_form_<?php echo $result->id; ?>' class='scc_wrapper scc_font_<?php echo $idvalue; ?>'>
  <div class="form-group scc_font_<?php echo $idvalue; ?>" style="padding: 15px;border: 0px outset;">
    <?php
    echo (isset($result->description) && $result->description != '') ? "<div><p>".stripslashes($result->description)."</p></div>" : '';
    $formstored = json_decode(stripslashes(stripslashes($result->formstored)));

    scc_item_handler::createItem($idvalue, $formstored, $result->id);//let's create the items now, like dropdown, switch, etc

    echo "<hr style='margin: 36px 0 18px 0;'\>";
    echo "<div class='row' style='height: 60px;padding: 5px;'>";
    echo "<div class='col-md-3 col-lg-3 col-xs-7 printTable'><a class='trigger' href='javascript:void(0)' onClick='SCCOpenModal()' style='color: white;'>Send quote by email</a></div>";
    echo "<div class='col-md-3 col-lg-3 col-xs-7 printTable'><a class='trigger' href='javascript:void(0)' onClick='SCCPrintModal()' style='color: white;'>View detailed list</a></div>";
    echo "<div class='col-md-3 col-lg-4 col-xs-4'><div id='sccCurrencyUSD' style='display: none;'>".get_option('scc_currency', 'USD')."</div></div>";
    echo "<div class='col-md-3 col-lg-4 col-xs-4'><div style='display: none;'><input type='button' value='Submit' id='scc_submit_".$result->id."' class='submitPrices' /></div></div></div>";
    echo "<div class='row' style='height: 60px;padding: 5px 23px 0 5px;'>";
    echo "<div class='col-md-7 col-lg-7 col-xs-7' style='height: 100%;'>&nbsp;</div>";
    echo "<div class='col-md-12 col-lg-12 col-xs-12 totalPrice totalPrice_".$idvalue."'><p>Total: 0 ".get_option('scc_currency', 'USD')."</p></div></div></div>";
    echo "<hr/><div id='statusMsg'></div>";
    ?>

  </div>
  <div >
    <?php include_once SCC_DIR . '/shortcodes/scc_table_modal.php'; ?>
  </div>

<?php
static::addJavascript();
$data = ob_get_contents();
$sccs =  '#scc_submit_'.$result->id;
scc_item_handler::reload($sccs);
ob_end_clean();
return $data;
}

public static function createItem($idvalue, $formstored, $id)
{
  $a = 0;
  global $wpdb;
  $q = $wpdb->prepare("SELECT parameters FROM {$wpdb->prefix}scc_form_parameters WHERE form_id = %d", $id);
  $result_2 = $wpdb->get_row($q);
  $params = json_decode($result_2->parameters);
  if (is_array($formstored)) {
    foreach ($formstored as $opt) {
      if (!empty($opt->value)) {
        echo "<div class='scc-h2 scc_fonttitle_{$idvalue}'>".$opt->name."</div>";
        echo "<div class='scc_header_dash_{$idvalue}'></div>";
        echo ($opt->desc != '') ? "<div style='color:black;margin-bottom:20px;'>".($opt->desc)."</div>" : '';
        foreach ($opt->value as $key) {
          foreach ($key->Nooptions as $x) {
            $d=  str_replace('"', '', json_encode($x->type));
            switch ($d) {
              case 'titledescdiv':
                scc_item_handler::createTitleDesc($idvalue, $x->value, $opt->name, $opt->description, $a, $opt->type, $id, $params);
                break;
              case 'selectoption':
                scc_item_handler::createDropdownForm($idvalue, $x->value, $opt->name, $opt->section, $x->element, $id, $key->subsection);
                break;
              case 'switchoption':
                scc_item_handler::switchForm($idvalue, $x->value, $opt->name, $opt->section, $x->type, $id, $params, $x->element, $key->subsection);
                break;
              case 'AsliderOption':
                scc_item_handler::AsliderForm($idvalue, $x->value, $opt->name, $opt->description, $a, $opt->type, $id, $params);
                break;
              default:
                echo $d;
                break;
            }
          }
          if (!empty($key->minmax)) {
            scc_item_handler::sliderForm($idvalue, $key, $opt->name, $opt->section, $id, $params);
          }
          ++$a;
        }
          // echo "<div class='scc_header_dash_{$idvalue}' style='margin-top:20px;width:100%;'><hr></div>";
        }
      }
    }
  }
  public static function sliderForm($idvalue, $val, $name, $a, $id, $params)
  {
    $w = $val->subsection;

    $fval = $val->minmax; ?>
    <div class="col-md-12 col-lg-12 scc_font_<?php echo $idvalue; ?>" style="margin-top: 10px;">
      <label class="col-md-4 col-xs-12 control-label scc_font_<?php echo $idvalue; ?>"><?php echo $fval[0]->title ?></label>
      <div class="col-md-8 col-xs-12">
        <?php
        $aa = "";
        for ($i = 0; $i < count($fval); $i++) {
          if($i < count($fval)-1){
            $aa .= $fval[$i]->name.','.$fval[$i]->value1.','.$fval[$i]->value2.',';
          }
          else {
            $aa .= $fval[$i]->name.','.$fval[$i]->value1.','.$fval[$i]->value2;
          }
        }
        //        $aa= str_replace(', ', '', $aa);
        echo "<input  id='itemcreateds_".$a."_".$w."' data-inputtype='sliderinput' type='text' data-slider-tooltip='always' data-slider-tooltipstep='1'  data-slider-step='".$val->step."' class='slider itemCreated' data-slider-value='".$val->defaultValue."' data-slider-handlebackground='".$idvalue."' data-slider-multiplier='1' data-slider-min='".($fval[0]->name)."' data-slider-max='".($fval[count($fval)-1]->value1)."' data_range='".$aa." '/>"; ?>
        <div style="margin-top: 15px;"></div>
      </div>
    </div>
    <div style="clear: both;"></div>
    <script>
    jQuery( document ).ready(function() {   // Without JQuery
      var slider = new Slider("#itemcreateds_<?php echo $a."_".$w; ?>");
      slider.on("change", function(sliderValue) {triggerSubmit(<?php echo $id; ?>, "#itemcreateds_<?php echo $a."_".$w; ?>");});
    });
    jQuery( document ).ready(function() {   // Without JQuery
      triggerSubmit(<?php echo $id; ?>, "#itemcreateds_<?php echo $a."_".$w; ?>");
    });
    </script>
    <?php
  }
  public static function switchForm($idvalue, $values, $name, $a, $type, $id, $params, $idd, $idx)
  {
    $b = 1;
    $theStyle = "style='color: $params->objectColorPicker; font-size: $params->objectServicepricefontsize'";
    $theStyle2 = "style='background: $params->objectColorPicker; font-size: $params->objectServicepricefontsize'";
    foreach ($values as $val) {
      $typeFormat = $val->value2;
      $No = $val->No;
      if ($typeFormat == 1) {       /* Radio Button (circle) */ ?>
        <div class="col-md-12 col-lg-12" style="margin-top: 20px;">
          <label class="col-md-4 col-xs-6 control-label scc_font_<?php echo $idvalue; ?>"> <?php echo $val->name; ?></label>
          <label class="container_sccradio container_sccradio_<?php echo $idvalue; ?> col-md-8 col-lg-8 col-xs-6" >
            <input type="radio" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>" data-inputtype="<?php echo $type; ?>" class="itemCreated"   name="<?php echo $val->name; ?>" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
            <span class="checkmark" ></span>
          </label>
        </div>
        <div style="clear: both;"></div>
        <?php
      } elseif ($typeFormat == 2) {       /* Checkbox (Circle)*/ ?>
        <div class="col-md-12 col-lg-12 col-xs-12" style="margin-top: 20px;">
          <label class="col-md-4 col-xs-6 control-label scc_font_<?php echo $idvalue; ?>"><?php echo $val->name; ?></label>
          <label class="container_scccheck container_scccheck_<?php echo $idvalue; ?> col-md-8 col-lg-8 col-xs-6">
            <input type="checkbox" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>"  name="<?php echo $val->name; ?>"
            data-inputtype="<?php echo $type; ?>" class="itemCreated" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
            <span class="checkmark"></span>
          </label>
        </div>
        <div style="clear: both;"></div>
        <?php
      } elseif ($typeFormat == 3) {     /* Toggle Switch (rectangle)*/ ?>
        <div class="col-md-12 col-lg-12 col-xs-12" style="margin-top: 30px;">
          <div class="can-toggle">
            <input  type="checkbox" data-toggle="toggle" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>" data-inputtype="<?php echo $type; ?>" class="itemCreated"  name="<?php echo $val->name; ?>" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
            <label class="col-md-4 col-xs-6 scc_font_<?php echo $idvalue; ?>"><?php echo $val->name; ?></label>
            <label for="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
              <div class="can-toggle__switch can-toggle__switch_<?php echo $idvalue; ?>" data-checked="Yes" data-unchecked="No" <?php echo $theStyle2; ?>>
              </div>
            </label>
          </div>
        </div>
        <div style="clear: both;"></div>
        <?php
      } elseif ($typeFormat == 4) {     /* Toggle Switch (Circular)*/ ?>
        <div class="can-toggle demo-rebrand-2  col-md-12 col-lg-12 xs-12" style="margin-top: 20px; ">
          <input type="checkbox" data-toggle="toggle" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>" data-inputtype="<?php echo $type; ?>" class="itemCreated"  name="<?php echo $val->name; ?>" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
          <label for="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
            <label class="col-md-4 col-xs-6 control-label scc_font_<?php echo $idvalue; ?>"><?php echo $val->name; ?></label>
            <div class="can-toggle__switch can-toggle__switch_<?php echo $idvalue; ?> col-md-8 col-lg-8 col-xs-6" data-checked="Yes" data-unchecked="No" <?php echo $theStyle2; ?>>
            </div>
          </label>
        </div>
        <div style="clear: both;"></div>
        <?php
      } elseif ($typeFormat == 5) {  /* Radio Button (Animated Circle)*/ ?>
        <div class="col-md-12 col-lg-12 xs-12" style="margin-top: 20px; ">
          <label for="itemcreated__<?php echo $a; ?>_<?php echo $No; ?> col-md-4 col-lg-4 col-xs-6"></label>
          <div class="col-md-4 col-lg-4 col-xs-6">
            <label class="control-label scc_font_<?php echo $idvalue; ?>"><?php echo $val->name; ?></label>
          </div>
          <div class="pretty p-svg p-round p-plain p-jelly">
            <input type="checkbox" data-toggle="toggle" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>" data-inputtype="<?php echo $type; ?>" class="itemCreated" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>"  name="<?php echo $val->name; ?>">
            <div class="state p-success">
              <span class="svg" uk-icon="icon: check"></span>
              <label></label>
            </div>
          </div>
          <!-- <div class="pretty p-icon p-smooth">
          <input type="checkbox"  id="itemcreated_<?php echo $a; ?>_<?php echo $id; ?>"/>
          <div class="state p-success">
          <i class="icon fa fa-check"></i>
          <label>fa-check</label>
        </div>
      </div>
    </div> -->
  </div>
  <div style="clear: both;"></div>
  <?php
} else {
  ?>
  <div class="col-md-12 col-lg-12 col-xs-12" style="margin-top: 30px; ">
    <label class="col-md-4 col-xs-6 scc_font_<?php echo $idvalue; ?>"><?php echo $val->name; ?></label>
    <label class="switch scc_font_<?php echo $idvalue; ?>" style="float: right;">
      <input type="checkbox"  data-toggle="toggle" onClick="triggerSubmit(<?php echo $id; ?>, this)" datainputprice="<?php echo $val->value1; ?>" data-inputtype="<?php echo $type; ?>" class="itemCreated" id="itemcreated_<?php echo $a.'_'.$idx.'_'.$idd.'_'.$No; ?>">
      <span class="slider_switch round"></span>
    </label>
  </div>
  <div style="clear: both;"></div>
  <?php
}
$b++;
}
}
public static function createDropdownForm($idvalue, $formstored, $name, $a, $id, $idd, $pr)
{
  if (!is_array($formstored)) {
    return;
    $No = $formstored->No;
  } ?>
  <div class="col-md-12 col-lg-12" style="padding-top:20px;">
    <label class="col-md-4 col-lg-4 scc_font_<?php echo $idvalue; ?>" for="selectbasic"><?php echo $formstored[0]->title; ?></label>
    <div class="control-label col-md-8 col-lg-8 ">
      <select  id="selectbasic_<?php echo $a.'_'.$pr.'_'.$id; ?>"   name="selectbasic" data-dropdownmult=1 data-inputtype='dropdowninput' class="sccSel sccoptionval form-control itemCreated" onChange="selectChange(<?php echo $idd; ?>, this)">
        <option value='' data-description=" ">Choose an option...</option>
        <?php
        foreach ($formstored as $s) {
          //            echo "<option value='$s->value1' data-description=".json_encode($s->value2)."><p><span>".$s->name." - ".$s->value1." ".get_option('scc_currency')."</span></p><br><a>".json_encode($s->value2)."</a></option>";
          echo "<option value='$s->value1' data-description='".str_replace("'", "&#39;", str_replace("\"", "&#34;", $s->value2))."'>".$s->name." -  ".$s->value1." ".get_option('scc_currency')."</option>";
        } ?>
      </select>
    </div>
    <div style="clear: both;"></div>
  </div>
  <div style="clear: both;"></div>
  <script>
  jQuery(document).ready(function(e) {
    jQuery("#selectbasic_<?php echo $a.'_'.$pr.'_'.$id; ?>").msDropdown({roundedBorder:false});
  });
  </script>
  <?php
}
public static function reload($sccs)
{
  ?>
  <script>
  console.log("<?php echo $sccs; ?>",jQuery("<?php echo $sccs; ?>").get());
    jQuery('<?php echo $sccs; ?>').click();
  </script>
  <?php
}
public static function addJavascript()
{
  ?>
  <script>
  var triggerRadio = false;
  function selectChange(id, $this){
    triggerSubmit(id, $this);
  }
  function triggerSubmit_2(id, select_id, value, $this){
    jQuery('#' + select_id).attr('data-dropdownmult', value);
  }

  function triggerSubmit(id, $this){
    if (jQuery($this).is(':radio')){
      if (!triggerRadio) triggerRadio = true;
      else{
        triggerRadio = false;
        jQuery($this).prop('checked', false);
      }
    }
    sccsubmi =  '#scc_submit_' + id;
    jQuery(sccsubmi).trigger('click');
  }

  jQuery('.customComboBox li').click(function(){
    jQuery(this).html();
    jQuery(this).parent().find('li').removeClass('activated');
    jQuery(this).addClass('activated')
  });

  jQuery('.submitPrices').click(function(){
    var parent_id = "#" + jQuery(this).attr('id').replace('submit', 'form');
    var xprice = [];
    var dropprice2 = 0;
    var price = 0;
    var hmm = [];
    var lo = 0;
    //hmm =[];
    var dropprice1 = 0;
    var dropdownMult =0;
    var dropdownMult1 =0;
    var multislider = [];
    var totalnumber = 0;
    var sec;
    var sectionName =[];
    var parts=[];

    jQuery(parent_id + ' .itemCreated').each(function(){
      var totalnumber1=[];
      var sld = 1; console.log(jQuery(this).attr('id'));
      var _sec = parseInt((jQuery(this).attr('id')).split("_")[1]);
      var sub = parseInt((jQuery(this).attr('id')).split("_")[2]);

        console.log(sec,_sec,"yes", sub);
      if(sec != _sec){
        sec=_sec;
        multislider[sec] = [];
        hmm[sec] = [];
      }
      //            console.log(sec, sub,hmm);
      if(isNaN(hmm[sec][sub])) {hmm[sec][sub]= 0;}
      if ('switchoption' == jQuery(this).attr('data-inputtype') ){
        if (jQuery(this).is(':checked')){
          hmm[sec][sub] += parseFloat(jQuery(this).attr('datainputprice'));
          console.log("Name:",hmm,jQuery(this).parent().find('label:last').text(),jQuery(this).attr('name'),sec,sub);
          const switched={name: "<h4 class='performance-facts__summary3'>"+jQuery(this).attr('name')+"</h3>",
          value:parseFloat(jQuery(this).attr('datainputprice')),
          unit:null,
          section: sec,
          subsection: sub};
          parts.push(switched);
        }
      }
      else if ('dropdowninput' == jQuery(this).attr('data-inputtype')) {
        hmm[sec][sub] += parseFloat(getDropDownValue(this));// * parseInt(dropdownMult);
        console.log(hmm, jQuery(this).find("option:selected").text(), "dropdown", jQuery(this).find("option:selected").val(),sec,sub);
        if(jQuery(this).find("option:selected").val() != ""){
          const switched={name: "<div class='row-fluid performance-facts__summary7' style='display: grid;align-items: center;padding-left: 10px;font-weight: bold;'><div class='span2'>"+jQuery(this).find("option:selected").text()+"</div><div class='scc-span2'>"+jQuery(this).find("option:selected").attr('data-description')+"</div></div>",
          value:parseFloat(getDropDownValue(this)),
          unit:null,
          section: sec,
          subsection: sub};
          parts.push(switched);
        }
      }
      else if ('sliderinput' == jQuery(this).attr('data-inputtype')){
        totalnumber1 =jQuery(this).attr('data_range').split(",");
        var slide_value = parseFloat(jQuery(this).attr('data-value'));

        console.log(sec,sub, multislider,jQuery(this).parent().parent().find('label').text(),sec,sub)
        multislider[sec][sub]=slide_value;
        for (k=0;k<totalnumber1.length;k +=3){
          if ((parseInt(slide_value) <= parseInt(totalnumber1[k+1]))){
            hmm[sec][sub] += parseFloat(totalnumber1[k+2]);
            const switched={name: "<h4 class='performance-facts__summary3'>"+jQuery(this).parent().parent().find('label:last').text()+"</h3>",
            unit:slide_value,
            value: parseFloat(totalnumber1[k+2]),
            section: sec,
            subsection: sub};
            parts.push(switched);
            //price +=  multislider[j]*(xprice[j]+hmm[j]);
            break;
          }
        }
      }
      else {
        var sld = parseFloat(jQuery(this).val());
      }
    });
    var _unit =1;
    var _section =99999;
    var _usection =99999;

    for (var j = parts.length; j--;)
    {
      if(parts[j].section != _section || parts[j].subsection != _usection){
        if(parts[j].unit ==null)
          parts[j].unit =1;
        _unit = parts[j].unit;
        _section = parts[j].section;
        _usection = parts[j].subsection;
      }else {
        parts[j].unit = _unit;
        _unit = 1;
      }
    }
    console.log(parts, hmm);
    CreateTable(parts);
    for(i =0; i<hmm.length;i++){
      for(j=0; j<hmm[i].length; j++){
        if(multislider[i][j] === undefined || multislider[i].length == 0){
          price += hmm[i][j];
        }else {
          price += hmm[i][j]*multislider[i][j];
        }
      }
    }
    jQuery(parent_id + ' .totalPrice').fadeIn().html('Total: ' + (price).toFixed(2) + " " + jQuery('#sccCurrencyUSD').html());
  });

  function getDropDownValue($this){
    price = jQuery($this).val();
    if (! price) {   return 0; }
    else return price;
  }
  </script>
  <?php
}
}
scc_item_handler::init();
?>
