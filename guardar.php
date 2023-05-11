<?php 
 require_once "../../../wp-load.php";
    global $wpdb;

    $tabla ="wp_vacante_transporte_urbano";
 
   if (isset($_POST['variable_js'])) {

        $sql = 'DELETE FROM `'. $tabla .'` WHERE `Vacante_id` = '.$_POST["variable_js"].';';
        $wpdb->query($wpdb->prepare($sql));
        echo "eliminado";
      }