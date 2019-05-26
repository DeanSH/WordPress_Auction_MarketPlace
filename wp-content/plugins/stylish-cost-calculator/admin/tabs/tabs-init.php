<?php
function scc_tabs_init(){
    require_once dirname( __FILE__ ) . '/class-tabs-list-table.php';
    //require_once dirname( __FILE__ ) . '/tabs-functions.php';
    require_once dirname( __FILE__ ) . '/tabs-db-functions.php';
    require_once dirname( __FILE__ ) . '/class-stylish-cost-calculator-tabs-form-handler.php';
    require_once dirname( __FILE__ ) . '/class-stylish-cost-calculator-tabs.php'; 
}//end scc_init

add_action('init','scc_tabs_init',10);
