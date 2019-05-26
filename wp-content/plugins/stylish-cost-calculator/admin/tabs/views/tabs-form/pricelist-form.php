<?php
    wp_enqueue_style( 'wp-color-picker' ); 
    wp_enqueue_script('scc-bootstrap-min');
    wp_enqueue_script('scc-pricelist-admin-core');

    wp_enqueue_script('scc-pricelist-admin');
    wp_enqueue_style('scc-bootstrap-min');

?>
<?php 
$id='';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
?>
<?php 
$list_count=scc_get_tabs_coun();
$opt=scc_get_options();

$google_fonts_preview_out=$opt['google_fonts_preview_out'];
$html_out=$opt['html_out'];
$get_fonts_options=$opt['get_fonts_options'];
$max_cat_count=$opt['max_cat_count'];
$max_service_count=$opt['max_service_count'];
$max_list_count=$opt['max_list_count'];
if($list_count>=$max_list_count && empty($id)){echo want_more_lists(); return;};
// $want_more_lists=$opt['want_more_lists'];
?>

<?php
$cats_data=array();
$_init_service=array(
        'service_name' =>'',
        'service_price' => '',
        'service_desc' => ''
    );
$init_cat=array(
        'name'=>'',
        0=>$_init_service
    );
$cats_data['category'][1]=array(
        'name'=>'',
        1=>$_init_service
    );

$list_name='';
$hover_color='';
$title_color='';
$title_color_top='';
$price_color='';
$service_color='';

$list_name_font='';
$title_font='';
$price_font='';
$desc_font='';
if(!empty($id)){
    // $option_name=scc_get_option_name($id);
    // $cats_data=get_option($option_name);
    $cats_data=scc_get_option($id);
    // ob_start();

    // echo PHP_EOL;
    // $data=ob_get_clean();
    // file_put_contents(dirname(__FILE__) . '/fields_data_after_retrieve.log',$data,FILE_APPEND);

    $list_name=$cats_data['list_name'];
	$all_tab=$cats_data['all_tab'];
	$style_cat_tab_btn=$cats_data['style_cat_tab_btn'];
	$style=$cats_data['tab_style'];
    $hover_color=$cats_data['hover_color'];
  $service_color=$cats_data['service_color'];
    $title_color=$cats_data['title_color'];
    $price_color=$cats_data['price_color'];
  $title_size=$cats_data['title_font_size'];
  $title_color_top=$cats_data['title_color_top'];
  $select_price=$cats_data['servicepricefontsize'];

    $list_name_font=$cats_data['list_name_font'];
    $title_font=$cats_data['title_font'];
    $price_font=$cats_data['price_font'];
    $desc_font=$cats_data['desc_font'];
	$toggle=$cats_data['toggle'];
	$toggle_all_tab=$cats_data['toggle_all_tab'];
	$price_list_desc=$cats_data['price_list_desc'];
}
function want_more_lists(){
    ob_start();
    include_once dirname(__FILE__) . '/logo-header.php';
    ?>
    <div class="body-inner container-fluid" style="max-width:900px;margin-left:0px;">
        <div class="row cats-row">
            You're using the free version of this plugin, you can only use a maximum of 2 lists, 3 categories and 4 services. You can purchase a license to add unlimited lists and services. and categories. <a href="http://designful.ca/apps/stylish-cost-calculator-wordpress/"> Purchase Here</a>
        </div>
    </div>
    <?php
    $html=ob_get_clean();
    return $html;
}//end want_more_lists()

if(!function_exists('color_out')){
    function color_out($id,$value="",$title=""){
        ob_start();
        ?>
<div class="row cats-row">
    <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6 text-right lbl">
        <label for="<?php echo $id; ?>"><?php echo $title; ?></label>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6  col-lg-6 padl-align">
        <input type="text" name="<?php echo $id; ?>" id="<?php echo $id; ?>" class="form-control <?php echo $id; ?> color-picker" value="<?php echo $value; ?>" title="<?php echo $title; ?>">
    </div>
</div> <!-- <?php echo $title; ?> -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end color_out()
}//end if !function_exists('color_out')
if(!function_exists('how_to_get_google_fonts')){
    function how_to_get_google_fonts(){
        ob_start();
        ?>
        <div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                Enter your <b>license key</b> to get Google fonts,
                how Google fonts look like? check <a href="https://fonts.google.com/">Google fonts preview</a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end how_to_get_google_fonts()
}//end if !function_exists('how_to_get_google_fonts')
if(!function_exists('google_fonts_preview')){
    function google_fonts_preview(){
        ob_start();
        ?>
        <div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end google_fonts_preview()
}//end if !function_exists('google_fonts_preview')

if(!function_exists('html_out')){
    function html_out($name, $options=array(),$current_value='',$title=""){
        $html_out='hidden_html';//
        ob_start();
        ?>
        <div class="row cats-row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out($name,$options,$current_value); ?>
            </div>
        </div> <!-- List Name Font -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end html_out()
}//end if !function_exists('html_out')


if(!function_exists('hidden_html')){
    function hidden_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
?>
<input type="hidden" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" value="<?php echo $current_value; ?>">
<?php
        $html=ob_get_clean();
        return $html;
    }
}//end if !function_exists('hidden_html')
?>

<?php
if(!function_exists('select_html')){
    function select_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
?>
<div class="row cats-row">
    <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6 text-right lbl">
        <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6  col-lg-6 padl-align">
        <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" style="box-shadow: 2px 2px 0px #888;">
            <?php foreach ($options as $value => $label): ?>
                <?php
                    $selected='';
                    if($current_value==$value){
                        $selected=' selected="selected"';
                    }
          if($current_value==''){
          if($label=='Open Sans'){
            $selected=' selected="selected"';
            }
          }
                 ?>
                <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div> <!-- <?php echo $title; ?> -->
<?php
        $html=ob_get_clean();
        return $html;
    }
}//end if !function_exists('select_html')
?>
<?php
if(!function_exists('service_items_html')){
    function service_items_html($cat_id=0,$service_id=0,$service=null){
        ob_start();
        $items=array(
                array(
                    'title'=>'Service Name',
                    'id'=>'service_name',
                    ),
                array(
                    'title'=>'Service Price',
                    'id'=>'service_price',
                    ),
                array(
                    'title'=>'Service Description/Length',
                    'id'=>'service_desc',
                    ),
            );
        // $cat_id=0;
        // $service_id=0;
        foreach ($items as $key => $item) {
            $item['cat_id']=$cat_id;
            $item['service_id']=$service_id;
            $item['value']=$service[$item['id']];
            echo service_item($item);
        }
		$html=ob_get_clean();
        return $html;
    }//end service_items_html()
}//end if !function_exists('service_items_html')
if(!function_exists('add_remove_service')){
    function add_remove_service($max_service_count){
        ob_start();
        ?>
        <div class="row add-remove-service">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 remove-service">
                <a href="javascript:void(0);" onclick="remove_service(this)" class="remove-service add-remove-service">Remove Service [-] </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 add-service">
                <a href="javascript:void(0);" onclick="add_service(this,<?php echo $max_service_count; ?>)" class="add-service add-remove-service">Add Service <span class="crossnadd">[+]</span></a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end add_remove_service()
}//end if !function_exists('add_remove_service')

if(!function_exists('service_item')){
    function service_item($item){
        /*
        $item=array(
            'cat_id'=>0,
            'service_id'=>0,
            'title'=>'Service Name',
            'id'=>'service_name',
        );
        */
        ob_start();
        extract($item);
        $title="$title($service_id)";
        $name="category[{$cat_id}][{$service_id}][{$id}]";
        $html_id="category_{$cat_id}_{$service_id}_{$id}";
        $title=scc_remove_slash_quotes($title);
        $value=scc_remove_slash_quotes($value);
        ?>
        <div class="row service-price-length">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 lbl">
                <label for="<?php echo $html_id; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
            </div>
        </div>  <?php echo '<!-- ' . $title . ' -->'; ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end service_item()
}//end if !function_exists('service_item')

if(!function_exists('category_name_row')){
    function category_name_row($cat_id,$cat_name="",$cat_description){
        $cat_name=scc_remove_slash_quotes($cat_name);
        ob_start();
        ?>
        <div class="row category-name-row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="category_<?php echo $cat_id; ?>_name">Category Name(<?php echo $cat_id; ?>)</label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="category[<?php echo $cat_id; ?>][name]" id="category_<?php echo $cat_id; ?>_name" class="form-control category_name" value="<?php echo $cat_name; ?>" title="">
            </div>
        </div> <!-- Category Name -->
		<!--Category Description-->
		<div class="row category-description-row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="category_<?php echo $cat_id; ?>_description">Category Description(<?php echo $cat_id; ?>)</label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<textarea name="category[<?php echo $cat_id; ?>][description]" id="category_<?php echo $cat_id; ?>_description" class="form-control category_description" rows="2" cols="50"><?php echo $cat_description; ?></textarea>
            </div>
        </div>
		<!--End Category Description-->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end category_name_row()
}//end if !function_exists('category_name_row')

if(!function_exists('category_row')){
    function category_row($cat_id,$cat=null,$max_service_count=3){
		//echo $cat_id;
        ob_start();
        $cat_name="";
        if(!is_null($cat)){
            $cat_name=$cat['name'];
            unset($cat['name']);//remove the name items, so, we can use foreach to process
        }
		$cat_description="";
		if(!is_null($cat)){
            $cat_description=$cat['description'];
            unset($cat['description']);//remove the name items, so, we can use foreach to process
        }
        ?>
            <div class="row category-row">
                <?php

                    // $cat_id=0;
                    // $service_id=0;
                    echo category_name_row($cat_id,$cat_name,$cat_description);
                 ?>
                 <?php
                 foreach ($cat as $service_id => $service):
                ?>
                            <!-- echo category_row($cat_id,$service_id,$cat_name); -->
                    <div class="service-price-length-rows-wrapper">
                    <?php
                        echo service_items_html($cat_id,$service_id,$service);
                        echo add_remove_service($max_service_count);
                    ?>
                    </div> <!-- service-price-length-rows-wrapper -->

                <?php
                 endforeach;
				if($service_id > 1){
                ?>
				<a href="javascript:void(0);" id="remove-category-row" class="remove-category" onclick="">Remove Category [-] </a>
				<?php } ?>
            </div> <!-- category-row -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end category_row()
}//end if !function_exists('category_row')
?>
<style type="text/css">
    .category-name-row label,
    .add-category-row,.add-category-row:hover,.add-category-row:focus{
        color:#b70bb7;
        font-weight: bold;
    }

    .add-remove-service,.add-remove-service:hover,.add-remove-service:focus{
        color:#000;
        font-weight: bold;
    }

    .service-price-length label{
        color:#666;
        margin:0px;
    }

    .add-category-row-lbl,
    .category-name-row .lbl,
    .service-price-length .lbl{
        text-align: right;
    }
    .service-price-length .lbl{
        line-height: 30px;
    }
    .remove-service{
        text-align: right;
    }

    .cats-row,.category-row,
    .service-price-length{
        margin: 15px 0;
    }

    .add-remove-service{
        margin: 20px 0;
    }

    .category-name-row{
        padding-left: 15px;
        padding-right: 15px;
    }

    #wpcontent{
        background-color: #fff;
    }

    .scc-header.logo{
        position: relative;
        top: 0px !important;
    }
  .iris-picker.iris-border {
    z-index: 999;
  }
  .wp-picker-open {
    vertical-align: top;
  }
  #wpfooter{
      position: relative;
  }
  .wp-core-ui .button-primary {
    background: #314af3;
    border-color: #b5218f #314af3 #be3b9c;
    -webkit-box-shadow: 0 1px 0 #006799;
    box-shadow: 0 1px 0 #314af3;
    color: #fff;
    text-decoration: none;
    text-shadow: 0 -1px 1px #df9ece, 1px 0 1px #314af3, 0 1px 1px #314af3, -1px 0 1px #314af3;
    }
    .wp-core-ui .button-primary:hover {
    background: #314af3;
    border-color: #314af3;
    color: #fff;
    }
  <!--AK Style -->
  .containr .wp-picker-container {
    min-height: 36px !important;

  }
  input#submit_tabs:active, input#submit_tabs:focus {
    background: #314af3;
    border-color: #b5218f #314af3 #be3b9c;
    -webkit-box-shadow: 0 1px 0 #b5218f, 0 0 2px 1px #b5218f;
    box-shadow: 0 1px 0 #b5218f, 0 0 2px 1px #770e0e;
  }
  .notice-done {
    background: #fff;
    border-left: 4px solid #27c500;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    margin: 0px;
    padding: 1px 12px;
  }
  .notice-eror {
    background: #fff;
    border-left: 4px solid #ff0018;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    margin: 0px;
    padding: 1px 12px;
  }
  .containr label {
        font-weight: normal !important;
    }
  .price_wrapper input[type="radio"]:focus {
        outline: none !important;
    }
  @media screen and (min-width: 992px){
    .padl-align {
      padding-left: 22px !important;
    }
    .containr .wp-color-result {
      /*margin-left: 18px;*/
      vertical-align: top;
    }
  }
  #preview {
    text-decoration: none;
    color: white;
    background-color: #314af3;
    padding: 6px 10px;
    border-radius: 3px;
    margin-top: 11px;
     }
    .anqur {
    margin-left: 57px;
    margin-top: -46px;
    float: left;
    width: 100%;
    }
  div#flip i {
    margin-left: 10px;
}

#panel, #flip {
    padding: 16px;
    text-align: left;
    background-color: #f5f5f5;
    border-color: #ddd;
    border-radius: 4px;
    font-size: 20px;
}

    #panel {
    padding: 50px;
    disccay: none;
    }
  .price_wrapper .name-price-desc .desc {
    margin-top: 15px;
     }

 .remove-category {
    margin-left: 85px;
    color: #b70bb7;
    font-weight: 700;
}
.remove-category:hover {
    color: #b70bb7;
}
#all_tab {
    width: 65%;
}
span.all_tab_span {
    font-size: 10px;
}
.more_setting{
	disccay:none;
}
.more-stng-btn{
    background-color: #ffffff;
    padding: 10px 19px;
    color: #000;
    border: 1px solid #cccccc;
    border-radius: 5px;
	position:relative;
}
.more-stng-btn i{
	padding-left:10px;
}
.more-stng-btn-rotate i{
	padding-right: 10px;
    padding-left: 0px;
	transform: rotate(180deg);
}
.category-description-row .lbl {
    text-align: right;
}
.category-description-row label {
    color: #b70bb7;
    font-weight: bold;
}
	 <!--AK Style -->

</style>
<?php
  include_once dirname(__FILE__) . '/logo-header.php';
?>
<?php if (array_key_exists('error', $_GET)): ?>
    <div class="notice notice-error"><p><?php echo $_GET['error']; ?></p></div>
<?php endif; ?>
<?php if (array_key_exists('success', $_GET)): ?>
    <div class="notice notice-success"><p><?php echo $_GET['success']; ?></p></div>
<?php endif; ?>
<?php
$id=$_GET['id'];
$cats_data1=scc_get_option($id);
?>
<?php
            global $scc_googlefonts_var;
            $google_fonts=$scc_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );

            // $gf_fonts=$scc_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $scc_googlefonts_var->gf_normalize_font_name($font->family);

            //     $class[] = $normalized_name;

            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
        ?>
    <h1 style="height:1px; margin:0px; padding:0px;"></h1>
<div class="body-inner price_wrapper container-fluid" style="margin-left:0px;">
    <form action="" method="POST" role="form">

    <div style="max-width:900px;margin-left:0px;">

  <div class="row cats-row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php submit_button( __( 'Save', 'scc' ), 'primary', 'submit_tabs' ); ?>
        </div>
  </div>

  <?php
  $opt=get_option('scc_licensed');
     if(empty($opt) || $opt == 0){
       echo '<p class="free_version">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="http://designful.ca/apps/stylish-cost-calculator-wordpress/">here</a></span> to buy the pro version.</p>';
     }
  ?>
  <div class="row cats-row">
      <div  style="margin-bottom: 15px;"><label>Text Input</label><span style="margin-left: 5px;"><input type="radio" class="scc_inputopt" name="scc_inputopt" id="contactChoice1" value="1"></span></div>
      <div  style="margin-bottom: 15px;"><label>Select Input</label><span style="margin-left: 5px;"><input type="radio" class="scc_inputopt" name="scc_inputopt" id="contactChoice2" value="2"></span></div>
       <div  style="margin-bottom: 15px;"><label>Slider</label><span style="margin-left: 5px;"><input type="radio" class="scc_inputopt" name="scc_inputopt" id="contactChoice3" value="3"></span></div>
      <div  style="margin-bottom: 15px;"> <label>Switch</label><span style="margin-left: 5px;"><input type="radio" class="scc_inputopt" name="scc_inputopt" id="contactChoice4" value="4"></span></div>
      <div style="clear: both;"></div>
       <div class="col-xs-1 col-md-4 col-lg-4 lbl scc-options" id="scc_selopt_1">

       <h2>Text Input</h2>
               <div><label for="list_name">Label</label><br />
                  <input type="text" class="form-control list_name" id="textlabel" /></div>
               <div><label for="list_name">Input ID</label><br />
                  <input type="text" class="form-control list_name" id="textname" /></div>

              <div><label for="list_name">Placeholder</label><br />
                  <input type="text" class="form-control list_name" id="textplaceholder" /></div>
                  <div><label for="list_name">Price</label><br />
                  <input type="text" class="form-control list_name" id="textprice" /></div>
                    <div style="margin-top: 3px;">
                        <input type="submit" name="submit_tabs_3" id="submit_tabs_1" class="button button-primary preview_shortcode" value="Get Shortcode"> </div>
      </div>
      <div class="col-xs-12 col-md-4 col-lg-4 lbl scc-options" id="scc_selopt_2">
          <h2>Select</h2>
            <div><label for="list_name">Name</label><br />
                  <input type="text" class="form-control list_name" id="selectname" /></div>
              <div><label for="list_name">Price</label><br />
                  <input type="text" class="form-control list_name" id="selectprice" /></div>
              <div><label for="list_name">Placeholder</label><br />
                  <input type="text" class="form-control list_name" id="selectplaceholder" /></div>
                  <div style="margin-top: 3px;"><input type="submit" name="submit_tabs_3" id="submit_tabs_2" class="button button-primary preview_shortcode" value="Get Shortcode"> </div>
       </div>

        <div class="col-xs-12 col-md-4 col-lg-4 lbl scc-options" id="scc_selopt_3">
          <h2>Slider</h2>
            <div><label for="list_name">Name</label><br />
                  <input type="text" class="form-control list_name" id="slidername" /></div>
              <div><label for="list_name">Price</label><br />
                  <input type="text" class="form-control list_name" id="slicerprice" /></div>
              <div><label for="list_name">Placeholder</label><br />
                  <input type="text" class="form-control list_name" id="sliderplaceholder" /></div>
              <div style="margin-top: 3px;"><input type="submit" name="submit_tabs_3" id="submit_tabs_3" class="button button-primary preview_shortcode" value="Get Shortcode"> </div>
       </div>

       <div class="col-xs-12 col-md-4 col-lg-4 lbl scc-options" id="scc_selopt_4">
          <h2>Switch</h2>
            <div><label for="list_name">Name</label><br />
                  <input type="text" class="form-control list_name" id="switchname" /></div>
              <div><label for="list_name">Price</label><br />
                  <input type="text" class="form-control list_name" id="switchprice" /></div>
              <div><label for="list_name">Placeholder</label><br />
                  <input type="text" class="form-control list_name" id="switchplaceholder" /></div>
                  <div style="margin-top: 3px;"><input type="submit" name="submit_tabs_4" id="submit_tabs_4" class="button button-primary preview_shortcode" value="Get Shortcode">  </div>
       </div>

      <div class="col-xs-12 ">
          <hr style="color: #000; background: #000;" />
       </div>
      <div class="row" style="clear: both;">
          <h2 style="margin-top: 5px;">Shortcode:</h2>

          <div id="theShortCode">[]</div>
      </div>
      <div class="row" style="clear: both;">
          <h2 style="margin-top: 10px;">Preview:</h2>

          <div id="itemPreview"></div>
      </div>
  </div>

<script>
function textInput()
{

    var price = jQuery('#textprice').val();
    var placeholder = jQuery('#textplaceholder').val();
    var label = jQuery('#textlabel').val();
    var name = jQuery('#textname').val();
    jQuery('#theShortCode').html('[scc_stylish_item type="text" label="'+label+'" name="'+name+'" value="'+price+'" placeholder="'+ placeholder + '"]');
    jQuery('#itemPreview').html('<label>'+label +'</label>&nbsp;<input id="'+name+'" data-valprc="'+price+'" placeholder="'+ placeholder + '" />');
}
function selectInput()
{
    jQuery('#theShortCode').html('[scc_stylish_item type="select" name=""]');
    jQuery('#itemPreview').html('<select><option>1st</option><option>2nd</option><option>3rd</option></select>');
}
function switchInput()
{
    jQuery('#theShortCode').html('[scc_stylish_item type="switch" name=""]');
    jQuery('#itemPreview').html('<input placeholder="switch" />');
}
function sliderInput()
{
    jQuery('#theShortCode').html('[scc_stylish_item type="slider" name=""]');
    jQuery('#itemPreview').html('<input placeholder="slider" />');
}
jQuery(document).ready(function(){
      jQuery('.preview_shortcode').click(function()
       {
           //[scc_stylish_item name='mejor'  type='text' placeholder='stylish value' value='23']
           var $opt = parseInt ( jQuery(this).attr('id').replace('submit_tabs_', '') );
           switch ($opt)
           {
               case 1: textInput(); break;
               case 2: selectInput(); break;
               case 3: sliderInput(); break;
               case 4: switchInput(); break;
           }
           return false;
       } )
       jQuery('.scc_inputopt').click(function()
       {
           var bla = jQuery(this);
           jQuery('.scc-options').css({'display' : 'none'});
           jQuery('#scc_selopt_' + bla.val()).fadeIn();

       })
       jQuery('#scc_selopt_1').fadeIn();
       jQuery('.remove-category').click(function(){
		jQuery(this).closest('.category-row').remove();
	});

	/*jQuery('#all_tab').blur(function(){
		if( jQuery(this).val().length === 0 ) {
			jQuery("#sel1 option[value='']").remove();
		}
	});*/
	var data=jQuery('input[name=toggle_all_tab]:checked').val();
	if(data==0){
			jQuery("#sel1 option[value='']").remove();
		}
	$(".toggle_all_tab").change(function(){
		var data=jQuery(this).val();
		if(data==0){
			jQuery("#sel1 option[value='']").remove();
		}
	});
	jQuery('.advance_setting').click(function(){
		jQuery('.more-stng-btn').toggleClass('more-stng-btn-rotate');
		jQuery('.more_setting').toggle();
	});
        //jQuery.ajax()
});


</script>
