<?php
class Stylish_Cost_Calculator_EditItems {
    // var $license_return ='';

    public function __construct() {
        add_action( 'admin_init', array($this,'admin_init') );
        add_action( 'admin_menu', array($this,'admin_menu'), 90 );
    }

    function admin_init()
    {
       global $wpdb;
       $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}scc_forms");
       return $results;
    }
    function editOneItem()
    {
        global $wpdb;
        $id = (int)isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id == 0) { echo "<br /><p>ERROR - id $id is not numeric</p>"; die(); }
        $q = $wpdb->prepare("SELECT id, formname, formstored, description FROM {$wpdb->prefix}scc_forms WHERE id = %d LIMIT 1", $id);

        $result = $wpdb->get_row($q);
        $allinputstoadd = $result;//->ajaxform;
        if ($allinputstoadd)
        {
            $q = $wpdb->prepare("SELECT parameters FROM {$wpdb->prefix}scc_form_parameters WHERE form_id = %d LIMIT 1", $allinputstoadd->id);
            $result_2 = $wpdb->get_row($q);
        }
        include_once('templates/scc_edititems.php');
    }
    function editItems()
    {
        include_once SCC_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
?>
<div id="scc-demover" data-demo="<?php echo get_option('scc_licensed');?>"></div>
	<h1 style="height:1px; margin:0px; padding:0px;"></h1>
    <div class="purple_bar">Edit Item Lists</div>
	   <div class="panel-group" id="accordion1">
               <div class="scc_wrapper">
                   <?php $items = $this->admin_init();   ?>

                       <?php
                       $ii = 0;

                       foreach ($items as $itm)
                       {
                           $theInputs = json_decode( str_replace('\"', '"', $itm->formstored) ) ;

                       ?>
                       <div class="forms2edit col-xs-12 col-md-3" id="bigforms2edit<?php echo $itm->id; ?>">
                           <?php if ( 1 == 2) { ?><a class='forms2edit_a' href="<?php echo get_admin_url();?>?page=edit_sccbyid&id=<?php echo $itm->id; ?>"><?php echo $itm->formname; ?></a>
                           <?php
                           }?>
                           <h2 class="edith2"><?php echo stripslashes($itm->formname); ?></h2>

                       <?php
                       $fieldsArray = [];
                       /*echo "<div style='font-weight: bold; margin-bottom: 4px;'>Input Types Included:</div>";
                       foreach ($theInputs as $tp)
                           {
                               if (! in_array($tp->type, $fieldsArray))
                               {
                                   $fieldsArray[] = $tp->type;
                                   $forminx = str_replace(['dropdowninput', 'switchinput', 'sliderinput'], ['Drop Down Input', 'Switch Input', 'Slider Input'], $tp->type);
                                   echo "<div>".$forminx."</div>";
                               }

                           }*/
                       ?>
                           <p>
                               Shortcode is <strong>[scc_calculator type='text' idvalue='<?php echo $itm->id;?>']</strong>
                           </p>
                           <p><a class="crossnadd" href="<?php echo get_admin_url();?>?page=edit_sccbyid&id=<?php echo $itm->id; ?>">[E]</a> Edit <?php echo stripslashes($itm->formname); ?>
                           <br /><a class="crossnadd" onClick="deleteSCC(<?php echo $itm->id; ?>)" href="javascript:void(0)">[X]</a> Delete <?php echo stripslashes($itm->formname); ?></p>

                           <div class="yesnoeditscc" id="yesnoeditscc_<?php echo $itm->id; ?>"><span class="yesnoeditINN" id="yesnoeditINN_<?php echo $itm->id; ?>">YES</span> | <span class="yesnoeditINN">NO</span></div>
                       </div>
                       <?php
                       $ii++;
                           } ?>


               </div>
           </div>
    <div id="renderForm"></div>
    </div>
<script>
function deleteSCC(id)
{
     jQuery('.yesnoeditscc').fadeOut();
     jQuery('#yesnoeditscc_' + id).fadeIn();
}
jQuery('.yesnoeditINN').click(function()
{
    var opt = jQuery(this).html();
    if (opt.toLowerCase() == 'no') {  }
    else
    {
        var theid = jQuery(this).parent().attr('id').replace('yesnoeditscc_', '');
        $fragment_refresh =
        {
            url: rt_vars.rt_urlajax,
            type: 'POST',
            data: { action: 'sccSaveDel', id: theid },
            success: function( data ) { }
        };
        jQuery.ajax( $fragment_refresh );
        jQuery('#bigforms2edit' + theid).remove();
    }
    jQuery('.yesnoeditscc').fadeOut();
} );
</script>
<?php
}
   function admin_menu()
    {
        add_submenu_page(null, __( 'Edit Item XXX', 'scc' ), __( 'Edit Item XXXX', 'scc' ), 'manage_options', 'edit_sccbyid', array( $this, 'editOneItem' ) );
        add_submenu_page( 'scc-tabs', __( 'Edit Existing', 'scc' ), __( 'Edit Existing', 'scc' ), 'manage_options', 'Stylish_Cost_Calculator_EditItems', array( $this, 'editItems' ) );
//        add_submenu_page( 'scc-tabs', __( 'Diagnostic', 'scc' ), __( 'Diagnostic', 'scc' ), 'manage_options', 'Stylish_Cost_Calculator_Diagnostic', array( $this, 'diagnostic' ) );
    }
}
$stylish_cost_calculator_edititems = new Stylish_Cost_Calculator_EditItems();
?>
