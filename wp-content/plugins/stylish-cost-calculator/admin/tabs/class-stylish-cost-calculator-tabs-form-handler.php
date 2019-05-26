<?php
//echo "neutralized 1";
return;
/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Stylish_CostCalculator_Tabs_Form_Handler {
    /**
     * Hook 'em all
     */
    public function __construct() {
        //add_action( 'admin_init', array( $this, 'handle_scc_form' ) );
    }

    /**
     * Handle the tabs new and edit form
     *
     * @return void
     */
    public function handle_scc_orm() {
         //echo '<div style="disccay1:none;"><pre>';
         //var_dump(__METHOD__);
         //echo '</pre></div>';
         //die();
        if ( ! isset( $_POST['submit_tabs'] ) ) {
            return;
        }
        // echo '<div style="disccay1:none;"><pre>';
        // var_dump(__METHOD__);
        // echo '</pre></div>';
        // die();
        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'scc_nonce' ) ) {
            die( __( 'Are you cheating?', 'scc' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'scc' ) );
        }

        $errors   = array();
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : '';
        $page_url = admin_url( 'admin.php?page=scc-tabs&action=edit&id=' . $field_id);

        // $clicks = isset( $_POST['clicks'] ) ? sanitize_text_field( $_POST['clicks'] ) : '';

        // // some basic validation
        // if ( ! $clicks ) {
        //     $errors[] = __( 'Error: Clicks is required', 'scc' );
        // }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => urlencode($first_error) ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = $_POST;
        unset($fields['category'][0]);
        unset($fields['_wpnonce']);
        unset($fields['_wp_http_referer']);
        unset($fields['submit_tabs']);
        // ob_start();

        // echo PHP_EOL;
        // $data=ob_get_clean();
        // file_put_contents(dirname(__FILE__) . '/fields_before.log',$data);
        array_walk_recursive($fields, function (&$value) { $value = addslashes(strip_tags($value)); return $value;});
        // ob_start();

        // echo PHP_EOL;
        // $data=ob_get_clean();
        // file_put_contents(dirname(__FILE__) . '/fields_after.log',$data);
        // New or edit?
        if ( ! $field_id ) {

            $insert_id = scc_insert_tabs( $fields );
            $page_url = admin_url( 'admin.php?page=scc-tabs&action=edit&id=' . $insert_id);

        } else {

            $fields['id'] = $field_id;

            $insert_id = scc_insert_tabs( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg(
                array( 'error' => urlencode($insert_id->get_error_message()) ),
                $page_url
            );
        } else {
            $redirect_to = add_query_arg(
                array( 'success' => urlencode(__( 'Succesfully saved!', 'scc' )) ),
                $page_url
            );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Stylish_CostCalculator_Tabs_Form_Handler();
