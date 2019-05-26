<?php

class Stylish_CC_List_Tabs {

    /**
     * Kick-in the class
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {

        /** Top Menu **/
        global $submenu;
        add_menu_page( __( 'Stylish Cost Calculator', 'scc' ), __( 'Stylish Cost Calculator', 'scc' ), 'manage_options', 'scc-tabs', array( $this, 'plugin_page' ), SCC_URL . '/assets/images/scc_dashicon.png' , null );
        //$submenu['scc-tabs'][0]= '';
        add_submenu_page("scc-tabs", "Add New", "Add New", "publish_posts", "scc-tabs");
//        add_submenu_page( 'scc-tabs', __( 'Diagnostic', 'stylishpl' ), __( 'Diagnostic', 'stylishpl' ), 'manage_options', 'stylish_cost_calculator_diagnostic', array( $this, 'diagnostic_page' ) );
    }

    public function plugin_page_new() {
        $template = dirname( __FILE__ ) . '/views/tabs-new.php';
        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {
        $action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : 'list';
        $id     = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

        switch ($action) {
            case 'view':

                $template = dirname( __FILE__ ) . '/views/tabs-single.php';
                break;

            case 'edit':
                $template = dirname( __FILE__ ) . '/views/tabs-edit.php';
                break;

            case 'new':
                $template = dirname( __FILE__ ) . '/views/tabs-new.php';
                break;

            case 'readonly':
                $template = dirname( __FILE__ ) . '/views/tabs-readonly.php';
                break;

            case 'delete':
                $ids=isset( $_REQUEST['ids'] ) ? $_REQUEST['ids'] : null;
                if(!empty($ids)){
                    foreach ($ids as $key => $id) {
                        scc_delete_tabs_by_id($id);
                    }
                }else if(!empty($id)){
                    scc_delete_tabs_by_id($id);
                }
            default:
                $template = dirname( __FILE__ ) . '/views/tabs-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }
}

new Stylish_CC_List_Tabs();
