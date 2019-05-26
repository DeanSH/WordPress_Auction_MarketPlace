<?php 
function scc_row($key,$value){
    ob_start();
    ?>
    <tr class="row-<?php echo $key; ?>">
        <th scope="row" style="text-align: right">
            <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
        </th>
        <td style="padding-left: 10px;">
            <?php echo $value; ?>
        </td>
    </tr>
    <?php
    $html=ob_get_clean();
    return $html;
}
?>
<div class="wrap">
    <h2><?php _e( 'Refer', 'c9s' ); ?></h2>

    <?php $item = scc_get_tabs_by_id( $id ); ?>
    <?php $refer=unserialize($item->refer); ?>
    <table>
        <tbody>
            <?php foreach ($refer as $key => $value): ?>
                <?php echo scc_row($key , $value); ?>
            <?php endforeach ?>
         </tbody>
    </table>
</div>