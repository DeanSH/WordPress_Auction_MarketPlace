<?php
// // Register the script first.
function my_enqueue() {
  wp_register_script( 'rt_handle', '/assets/js/scc_scripts.php' );
  wp_register_script('rt_handle', SCC_URL . 'assets/js/scc.js', array('jquery'), '2.77', true);
 // // Now we can localize the script with our data.
  $translation_array = array( 'rt_adminurl' => admin_url(), 'rt_url' => get_site_url(), 'rt_urlajax' =>  (get_site_url() . '/wp-admin/admin-ajax.php') , 'a_value' => '10' );
//  wp_localize_script( 'rt_handle', 'rt_vars', $translation_array );


    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );

//    wp_localize_script( 'ajax-script', 'rt_vars',array( 'ajax_url' => admin_url('admin-ajax.php')));
    wp_localize_script( 'ajax-script', 'rt_vars',$translation_array);
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

// // // The script can be enqueued now or later.
// wp_enqueue_script( 'rt_handle' );
add_action('wp_ajax_sccSaveField', 'scc_saveField');
add_action('wp_ajax_sccSaveSettings', 'scc_saveSettings');
add_action('wp_ajax_sccSaveEmailSettings', 'scc_saveEmailSettings');
add_action('wp_ajax_sccSaveDel', 'scc_DelForm');
add_action('wp_ajax_loadExample', 'scc_LoadExample');
add_action('wp_ajax_sccSendEmail','scc_SendEmail');
add_action('wp_ajax_sccSavePDF','scc_SavePDF');
add_action('wp_ajax_nopriv_sccSendEmail','scc_SendEmail');
add_action('wp_ajax_nopriv_sccSavePDF','scc_SavePDF');

function scc_DelForm()
{
    global $wpdb;
    if (!isset($_POST['id'])) { echo "ERROR - value does not exist"; return; }
    $id = (int)$_POST['id'];
    if ($id == 0) { echo "ERROR - value is 0"; return; }
    $query = $wpdb->prepare( "DELETE FROM {$wpdb->prefix}scc_forms WHERE id = %d LIMIT 1", $id );
    $wpdb->query($query);
}
function scc_LoadExample()
{
    global $wpdb;
    $data_example = $_POST['data_example'];
    if ($data_example == 0)
    {
      $query = "INSERT INTO {$wpdb->prefix}scc_forms (id,formname,description,ajaxform,formstored) VALUES (NULL, 'Venue Rental', '', '', '[{\"name\":\"Base package\",\"desc\":\" Below is a list of collections that you can choose a base. You may add any a-la-carte features later.\",\"section\":0,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Choose a base package\",\"name\":\"Hearty\",\"value1\":\"4800\",\"value2\":\" This is Selection-1\"},{\"No\":1,\"title\":\"Choose a base package\",\"name\":\"Bourter\",\"value1\":\"2800\",\"value2\":\" This is Selection-2\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0},{\"subsection\":1,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Test\",\"value1\":\"100\",\"value2\":\"3\"}],\"length\":1}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]},{\"name\":\"A-La-Carte\",\"desc\":\" lease add on any additions features you may want\",\"section\":1,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Engagement Session\",\"value1\":\"600\",\"value2\":\"4\"},{\"No\":1,\"title\":0,\"name\":\"Engagement Photo Guestbook\",\"value1\":\"350\",\"value2\":\"4\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]},{\"name\":\"Extra hours\",\"desc\":\" If you need any extra hours, please select.\",\"section\":2,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"qw\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":1,\"title\":0,\"name\":\"we\",\"value1\":\"300\",\"value2\":\"1\"}],\"length\":2}],\"minmax\":[{\"No\":0,\"title\":\"Choose extra hours $500 per hour\",\"name\":\"0\",\"value1\":\"10\",\"value2\":\"500\"}],\"step\":\"1\",\"defaultValue\":\"0\"}]}]');";
      $wpdb->query($query);
      $id = $wpdb->insert_id;
      $query = "INSERT INTO `{$wpdb->prefix}scc_form_parameters` (id,form_id,parameters) VALUES (NULL,'.$id.','{\"fontType\":\"432\",\"colorPicker\":\"#000\",\"servicepricefontsize\":\"12px\",\"objectColorPicker\":\"#000\",\"objectServicepricefontsize\":\"50px\",\"titleFontType\":\"432\",\"titleColorPicker\":\"#000\",\"titleServicepricefontsize\":\"12px\"}');";
      $wpdb->query($query);
    }elseif ($data_example == 1)
    {
    $query = "INSERT INTO {$wpdb->prefix}scc_forms (id,formname,description,ajaxform,formstored) VALUES (NULL, 'Website Designer', '', '', '[{\"name\":\"Essentials\",\"desc\":\" Please fill out the essentials below.\",\"section\":0,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Website platform\",\"name\":\"WordPress\",\"value1\":\"1000\",\"value2\":\" Base fee for a WordPress website starts at $1,000\"},{\"No\":1,\"title\":\"Website platform\",\"name\":\"Shopify\",\"value1\":\"800\",\"value2\":\"  Base fee for a WordPress website starts at $800\"},{\"No\":2,\"title\":\"Website platform\",\"name\":\"HTML\",\"value1\":\"2000\",\"value2\":\"   Base fee for a WordPress website starts at $2,000\"}],\"length\":3}],\"minmax\":[],\"step\":0,\"defaultValue\":0},{\"subsection\":1,\"Nooptions\":[],\"minmax\":[{\"No\":0,\"title\":\"How many pages\",\"name\":\"0\",\"value1\":\"15\",\"value2\":\"100\"}],\"step\":\"1\",\"defaultValue\":\"5\"}]},{\"name\":\"Additional Features\",\"desc\":\" \",\"section\":1,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Contact Form\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":1,\"title\":0,\"name\":\"Sliders/Banners\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":2,\"title\":0,\"name\":\"Scheduling/Booking System\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":3,\"title\":0,\"name\":\"Mailing List\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":4,\"title\":0,\"name\":\"Mobile Responsive\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":5,\"title\":0,\"name\":\"Shopping Cart/E-Commerce\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":6,\"title\":0,\"name\":\"Social Media Feeds\",\"value1\":\"100\",\"value2\":\"1\"}],\"length\":7}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]},{\"name\":\"Addition work\",\"desc\":\" \",\"section\":2,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Logo Design\",\"value1\":\"400\",\"value2\":\"2\"},{\"No\":1,\"title\":0,\"name\":\"Business Card Design\",\"value1\":\"200\",\"value2\":\"2\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0},{\"subsection\":1,\"Nooptions\":[],\"minmax\":[{\"No\":0,\"title\":\"SEO (How many Keywords?)\",\"name\":\"0\",\"value1\":\"5\",\"value2\":\"100\"}],\"step\":\"1\",\"defaultValue\":\"0\"}]}]');";
    $wpdb->query($query);
    $id = $wpdb->insert_id;
    $query = "INSERT INTO `{$wpdb->prefix}scc_form_parameters` (id,form_id,parameters) VALUES (NULL,'.$id.','{\"fontType\":\"432\",\"colorPicker\":\"#000\",\"servicepricefontsize\":\"16px\",\"objectColorPicker\":\"#2374dd\",\"objectServicepricefontsize\":\"50px\",\"titleFontType\":\"98\",\"titleColorPicker\":\"#2374dd\",\"titleServicepricefontsize\":\"30px\"}');";
    $wpdb->query($query);
    }
    elseif ($data_example == 2)
    {
    $query = "INSERT INTO {$wpdb->prefix}scc_forms (id,formname,description,ajaxform,formstored) VALUES (NULL, 'Wedding Photographer', '', '', '[{\"name\":\"Base package\",\"desc\":\" Below is a list of collections that you can choose a base. You may add any a-la-carte features later.\",\"section\":0,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Choose a base package\",\"name\":\"Hearty\",\"value1\":\"4800\",\"value2\":\"  All Day Coverage + Online Gallery + Timeline Assistance\"},{\"No\":1,\"title\":\"Choose a base package\",\"name\":\"Keepsake\",\"value1\":\"3800\",\"value2\":\" 8 Hours Coverage + Online Gallery + Timeline Assistance\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]},{\"name\":\"A-La-Carte Options\",\"desc\":\" Please add on any additions features you may want \",\"section\":1,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Engagement Session\",\"value1\":\"600\",\"value2\":\"4\"},{\"No\":1,\"title\":0,\"name\":\"Engagement Photo Guestbook\",\"value1\":\"350\",\"value2\":\"4\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]},{\"name\":\"Extra hours\",\"desc\":\" Do you need any additional hours?\",\"section\":2,\"value\":[{\"subsection\":0,\"Nooptions\":[],\"minmax\":[{\"No\":0,\"title\":\"Amount of hours\",\"name\":\"0\",\"value1\":\"10\",\"value2\":\"100\"}],\"step\":\"1\",\"defaultValue\":\"0\"}]}]');";
    $wpdb->query($query);
    $id = $wpdb->insert_id;
    $query = "INSERT INTO `{$wpdb->prefix}scc_form_parameters` (id,form_id,parameters) VALUES (NULL,'.$id.','{\"fontType\":\"0\",\"colorPicker\":\"#ed7498\",\"servicepricefontsize\":\"16px\",\"objectColorPicker\":\"#ed094d\",\"objectServicepricefontsize\":\"50px\",\"titleFontType\":\"159\",\"titleColorPicker\":\"#ed094d\",\"titleServicepricefontsize\":\"38px\"}');";
    $wpdb->query($query);
    }
    elseif ($data_example == 3)
    {
    $query = "INSERT INTO {$wpdb->prefix}scc_forms (id,formname,description,ajaxform,formstored) VALUES (NULL, 'Car Rental', '', '', '[{\"name\":\"Vehicle type\",\"desc\":\"Please select your vehicle type. \",\"section\":0,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Vehicle\",\"name\":\"Hyundai i10\",\"value1\":\"27\",\"value2\":\" \"},{\"No\":1,\"title\":\"Vehicle\",\"name\":\"Hyundai Accent\",\"value1\":\"29\",\"value2\":\" Compact car\"},{\"No\":2,\"title\":\"Vehicle\",\"name\":\"Hyundai Azera \",\"value1\":\"36\",\"value2\":\" \"}],\"length\":3},{\"element\":1,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Insurance level\",\"name\":\"PDW (Partial Damage Waiver)\",\"value1\":\"2\",\"value2\":\" $2 per day\"},{\"No\":1,\"title\":\"Insurance level\",\"name\":\"LDW (Loss Damage Waiver)\",\"value1\":\"3\",\"value2\":\"  $3 per day\"}],\"length\":2}],\"minmax\":[{\"No\":0,\"title\":\"Days rented\",\"name\":\"0\",\"value1\":\"30\",\"value2\":\"0\"}],\"step\":\"1\",\"defaultValue\":\"1\"}]},{\"name\":\"Extras\",\"desc\":\" You must select at least one option\",\"section\":1,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Baby seat\",\"value1\":\"20\",\"value2\":\"3\"},{\"No\":1,\"title\":0,\"name\":\"Extra driver\",\"value1\":\"15\",\"value2\":\"3\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]}]');";
    $wpdb->query($query);
    $id = $wpdb->insert_id;
    $query = "INSERT INTO `{$wpdb->prefix}scc_form_parameters` (id,form_id,parameters) VALUES (NULL,'.$id.','{\"fontType\":\"0\",\"colorPicker\":\"#000\",\"servicepricefontsize\":\"16px\",\"objectColorPicker\":\"#000\",\"objectServicepricefontsize\":\"50px\",\"titleFontType\":\"0\",\"titleColorPicker\":\"#000\",\"titleServicepricefontsize\":\"30px\"}');";
    $wpdb->query($query);
    }
    elseif ($data_example == 4)
    {
    $query = "INSERT INTO `{$wpdb->prefix}scc_forms` (id,formname,description,ajaxform,formstored) VALUES (NULL, 'T-shirt Printing', '', '', '[{\"name\":\"Custom T-Shirt Printing\",\"desc\":\"Please fill out the form below to get an accurate price for custom screen printing. \",\"section\":0,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Shirt type\",\"name\":\"Tee\",\"value1\":\"0\",\"value2\":\"No extra cost for tees \"},{\"No\":1,\"title\":\"Shirt type\",\"name\":\"Soft tee\",\"value1\":\"1\",\"value2\":\"An extra dollar per shirt for soft tees \"},{\"No\":2,\"title\":\"Shirt type\",\"name\":\"Racerback\",\"value1\":\"1\",\"value2\":\" An extra dollar per shirt for racerbacks\"}],\"length\":3},{\"element\":1,\"type\":\"selectoption\",\"value\":[{\"No\":0,\"title\":\"Logo location\",\"name\":\"1 Logo on White Material\",\"value1\":\"0\",\"value2\":\"Included in price \"}],\"length\":1}],\"minmax\":[{\"No\":0,\"title\":\"Shirt quantity\",\"name\":\"0\",\"value1\":\"1\",\"value2\":\"28\"},{\"No\":1,\"title\":\"Shirt quantity\",\"name\":\"2\",\"value1\":\"3\",\"value2\":\"25\"},{\"No\":2,\"title\":\"Shirt quantity\",\"name\":\"4\",\"value1\":\"5\",\"value2\":\"21\"},{\"No\":3,\"title\":\"Shirt quantity\",\"name\":\"6\",\"value1\":\"7\",\"value2\":\"19\"}],\"step\":\"1\",\"defaultValue\":\"1\"}]},{\"name\":\"Graphic Design\",\"desc\":\" Do you need any graphics created for this shirt printing project?\",\"section\":1,\"value\":[{\"subsection\":0,\"Nooptions\":[{\"element\":0,\"type\":\"switchoption\",\"value\":[{\"No\":0,\"title\":0,\"name\":\"Front only design\",\"value1\":\"100\",\"value2\":\"1\"},{\"No\":1,\"title\":0,\"name\":\"Front and back design\",\"value1\":\"175\",\"value2\":\"1\"}],\"length\":2}],\"minmax\":[],\"step\":0,\"defaultValue\":0}]}]');";
    $wpdb->query($query);
    $id = $wpdb->insert_id;
    $query = "INSERT INTO `{$wpdb->prefix}scc_form_parameters` (id,form_id,parameters) VALUES (NULL,'.$id.','{\"fontType\":\"447\",\"colorPicker\":\"#565656\",\"servicepricefontsize\":\"16px\",\"objectColorPicker\":\"#3695c4\",\"objectServicepricefontsize\":\"50px\",\"titleFontType\":\"390\",\"titleColorPicker\":\"#3695c4\",\"titleServicepricefontsize\":\"30px\"}');";
    $wpdb->query($query);
    }
    echo $id; exit;
}
function scc_saveSettings()
{
    $cs = (int)$_POST['color_scheme'];
    if ($cs == 0) $cs = 1;
    update_option('scc_color-scheme', $cs);
    update_option('scc_currency', $_POST['currency_code']);
}

function scc_saveEmailSettings()
{
    $sender = $_POST['sender_name'];
    $email =  $_POST['sender_email'];
    $message = $_POST['message_form'];

    update_option('scc_emailsender', $email);
    update_option('scc_sendername', $sender);
    update_option('scc_messageform', $message);
    echo "Done";
    die();
}

function scc_saveField()
{
    global $wpdb;

    $wild = '"';
    $like1 = NULL;
    $like2 = $wpdb->esc_like($_POST['fieldname']);
    $like3 = $wpdb->esc_like(base64_decode($_POST['fieldform'])); //$wild . $wpdb->esc_like(json_encode($_POST['fieldform'])) . $wild;
    $like4 = $wpdb->esc_like($_POST['fieldPreview']); //$wild . $wpdb->esc_like($_POST['fieldPreview']) . $wild;
    $like5 = $wpdb->esc_like($_POST['adminsettingsid']); // $wild . $wpdb->esc_like($_POST['adminsettingsid']) . $wild;

    if (isset($_POST['adminsettingsid']) && is_numeric($_POST['adminsettingsid']))
    {
      //  $query = $wpdb->prepare( "UPDATE {$wpdb->prefix}scc_forms SET formname = %s, ajaxform = %s, formstored = %s, description = %s WHERE id = %d", like_escape($_POST['fieldname']), like_escape($_POST['fieldform']), like_escape($_POST['fieldPreview']),$like4, $_POST['adminsettingsid']);
      $query = $wpdb->prepare( "UPDATE {$wpdb->prefix}scc_forms SET description = %s, formname = %s, ajaxform = %s, formstored = %s WHERE id = %d", $like1, $like2, $like3, $like4, $like5);
        $last_id = $_POST['adminsettingsid'];
        $wpdb->query($query);
        $parameters = array();
        $parameters['fontType'] = isset($_POST['fontType']) ? $_POST['fontType'] : '';
        $parameters['colorPicker'] = isset($_POST['colorPicker']) ? $_POST['colorPicker'] : '';
        $parameters['servicepricefontsize'] = isset($_POST['servicepricefontsize']) ? $_POST['servicepricefontsize'] : '';

        $parameters['objectColorPicker'] = isset($_POST['objectColorPicker']) ? $_POST['objectColorPicker'] : '';
        $parameters['objectServicepricefontsize'] = isset($_POST['objectServicepricefontsize']) ? $_POST['objectServicepricefontsize'] : '';
        $parameters['titleFontType'] = isset($_POST['title_fontType']) ? $_POST['title_fontType'] : '';
        $parameters['titleColorPicker'] = isset($_POST['title_colorPicker']) ? $_POST['title_colorPicker'] : '';
        $parameters['titleServicepricefontsize'] = isset($_POST['title_servicepricefontsize']) ? $_POST['title_servicepricefontsize'] : '';

        $parameters = json_encode($parameters);
        $like6 = $wpdb->esc_like( $parameters);
        //$query = $wpdb->prepare( "UPDATE {$wpdb->prefix}scc_form_parameters SET parameters = %s WHERE form_id = %d LIMIT 1", like_escape($parameters), $_POST['adminsettingsid']);
        $query = $wpdb->prepare( "UPDATE {$wpdb->prefix}scc_form_parameters SET parameters = %s WHERE form_id = %d LIMIT 1", $like6, $like5);
        $wpdb->query($query);
    }
    else
    {
        //$query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}scc_forms (id, formname, ajaxform, formstored,description) VALUES (NULL, %s, %s, %s, %s)", like_escape($_POST['fieldname']), like_escape($_POST['fieldform']), like_escape($_POST['fieldPreview']),$like4);
        $query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}scc_forms (id, description, formname, ajaxform, formstored) VALUES (NULL, %s, %s, %s, %s)", $like1, $like2, $like3, $like4);
        $wpdb->query($query);
        $last_id = $wpdb->insert_id;

        $parameters = array();
        $parameters['fontType'] = isset($_POST['fontType']) ? $_POST['fontType'] : '';
        $parameters['colorPicker'] = isset($_POST['colorPicker']) ? $_POST['colorPicker'] : '';
        $parameters['servicepricefontsize'] = isset($_POST['servicepricefontsize']) ? $_POST['servicepricefontsize'] : '';

        $parameters['objectColorPicker'] = isset($_POST['objectColorPicker']) ? $_POST['objectColorPicker'] : '';
        $parameters['objectServicepricefontsize'] = isset($_POST['objectServicepricefontsize']) ? $_POST['objectServicepricefontsize'] : '';
        $parameters['titleFontType'] = isset($_POST['title_fontType']) ? $_POST['title_fontType'] : '';
        $parameters['titleColorPicker'] = isset($_POST['title_colorPicker']) ? $_POST['title_colorPicker'] : '';
        $parameters['titleServicepricefontsize'] = isset($_POST['title_servicepricefontsize']) ? $_POST['title_servicepricefontsize'] : '';

        $parameters = json_encode($parameters);
        $like7 = $wpdb->esc_like( $parameters);
        //$query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}scc_form_parameters (id, form_id, parameters) VALUES (NULL, %d, %s)", $last_id, like_escape($parameters));
        $query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}scc_form_parameters (id, form_id, parameters) VALUES (NULL, %d, %s)", $last_id, $like7);
        $wpdb->query($query);
    }
    echo $last_id;
    die();
}
function new_mail_from($old) {
    return get_option('scc_emailsender');;
}

function new_mail_from_name($old) {
    return get_option('scc_sendername');
}
function scc_SendEmail()
{
  if(!empty($_POST['image'])){
    $image = $_POST['image'];
    function generateRandomString($length = 10) {
      return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
      }

      $randomFileName = generateRandomString();
      $fileName = dirname( __FILE__ )  . '/upload/'.$randomFileName.'.png';
      //Get the base-64 string from data
      $filteredData=substr($_POST['image'], strpos($_POST['image'], ",")+1);
      //Decode the string
      $unencodedData=base64_decode($filteredData);
      //Save the image
      file_put_contents($fileName, $unencodedData);

      if (!isset($_POST['email_to'])) { echo "ERROR - its empty address"; return; }
      $to = $_POST['email_to'];
      $user = $_POST['user_to'];
      $title = $_POST['title'];
      $from =get_option('scc_sendername');
      $message = get_option('scc_messageform');
      if(preg_replace('/\s/', '',$message) == '' || empty($message)){
        $body = "Hello ".$user.",\r\n\r\n Please find your attached quote. We appreciate your visiting.\r\n\r\n Thanks\r\n".$from."";
      }else {
       $body=str_replace("<customer>", strtolower($user), $message);
       $body=str_replace("<sender>", $from, $body);
      }
      add_filter('wp_mail_from', 'new_mail_from');
      add_filter('wp_mail_from_name', 'new_mail_from_name');

      $headers = '';
      $subject = $title." quote";
      $status = wp_mail($to, $subject, $body,$headers, $fileName);
      return $status;
      wp_die();
    }
}
function scc_SavePDF(){
return "true";
}

function wpo_wcpdf_dompdf_options_custom($options) {
    $options['isHtml5ParserEnabled'] = true;
    return $options;
}

function pdf_create($html, $filename, $stream=true, $papersize = 'letter', $orientation = 'portrait')
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($papersize, $orientation);
    $dompdf->render();

    if ($stream)
    {
        $options['Attachment'] = 1;
        $options['Accept-Ranges'] = 0;
        $options['compress'] = 1;
        $dompdf->stream($filename.".pdf", $options);
    }
    else
    {
        write_file("$filename.pdf", $dompdf->output());
    }
}
?>
