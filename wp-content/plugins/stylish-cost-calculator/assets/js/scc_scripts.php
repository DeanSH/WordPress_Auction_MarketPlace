<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function scc_scripts(){
wp_register_style('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/css/bootstrap.min.css');
wp_enqueue_style('scc-bootstrap-min');

wp_register_style('scc-bootstrapslider-css', SCC_URL . 'assets/lib/bootstrap-slider/css/bootstrap-slider.css');
wp_enqueue_style('scc-bootstrapslider-css');

wp_register_style('scc-admin-style', SCC_URL  . 'styles/main-static.css', array(), '3.1.1');
wp_enqueue_style('scc-admin-style');

wp_register_style('scc-checkbox1', SCC_URL  . 'styles/checkboxes/customcheckbox.css', array(), '3.1.1');
wp_enqueue_style('scc-checkbox1');

wp_register_style('scc-checkbox2', SCC_URL  . 'styles/checkboxes/customradio.css', array(), '3.1.1');
wp_enqueue_style('scc-checkbox2');

wp_register_style('scc-checkbox3', SCC_URL  . 'styles/checkboxes/checkboxstyles.css', array(), '3.1.1');
wp_enqueue_style('scc-checkbox3');

wp_register_style('scc-dropbox', SCC_URL  . 'styles/msdropdown/dd.css', array(), '1.0.3');
wp_enqueue_style('scc-dropbox');

wp_register_style('gf-admin-style', SCC_URL  . 'styles/scc-style_'.$sc_scheme.'.css', array(), '3.1.1');
wp_enqueue_style('gf-admin-style');

wp_register_style('pretty-checkbx', 'https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css');
wp_enqueue_style('pretty-checkbx');

//// Script /////
wp_register_script('scc-bootstrap-min', SCC_URL . 'assets/lib/bootstrap-3.3.5/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
wp_enqueue_script('scc-bootstrap-min');

wp_register_script('scc-bootstrapslider-js', SCC_URL . 'assets/lib/bootstrap-slider/js/bootstrap-slider.js', array('jquery'), '4.4', true);
wp_enqueue_script('scc-bootstrapslider-js');

wp_register_script('scc-js-js', SCC_URL . 'assets/js/scc.js', array('jquery'), '2.77', true);
wp_enqueue_script('scc-js-js');

wp_register_script('html2canvas-js', SCC_URL . 'assets/js/html2canvas.js');
wp_enqueue_script('html2canvas-js');

wp_register_script('jspdf-debug-js', SCC_URL . 'assets/js/jspdf.debug.js');
wp_enqueue_script('jspdf-debug-js');

wp_register_script('scc-js-js_2', SCC_URL . 'assets/js/jquery.dd.min.js', array('jquery'), '1.2', true);
wp_enqueue_script('scc-js-js_2');
wp_enqueue_style('scc-checkbox1');
}
?>
