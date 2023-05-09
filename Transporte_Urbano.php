<?php
/*
Plugin Name: Transporte Urbano
Description: Plugin para manejar las vacantes y las necesidades
Author: Harvey Riascos
*/

function Activar(){
    global $wpdb;

    $sql="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}Vacante_Transporte_Urbano(
        Vacante_id INT NOT NULL AUTO_INCREMENT,
        TIPO_VEHICULO VARCHAR(45) NULL,
        TIPO_CARROCERIA VARCHAR(45) NULL,
        MODELO_VEHICULO VARCHAR(45) NULL,
        DIRECCION_CARGUE VARCHAR(45) NULL,
        CONTACTO VARCHAR(45) NULL,
        TELEFONICO VARCHAR(45) NULL,
        COMPROMISO_CARGUE VARCHAR(45) NULL,
        TIPO_CARGA VARCHAR(45) NULL,
        CARGUE_DESCARGUE VARCHAR(45) NULL,
        DIMENSIONES_CARGA VARCHAR(45) NULL,
        PESO VARCHAR(45) NULL,
        FECHA VARCHAR(45) NULL,
        FLETE VARCHAR(45) NULL,
        OBSERVACIONES TEXT NULL,
        PRIMARY KEY(Vacante_id)
    )";



    $wpdb->query($sql);
}

function Desactivar(){
    flush_rewrite_rules();
}

function Borrar(){

}

register_activation_hook(__FILE__,'Activar');
register_deactivation_hook(__FILE__,'Desactivar');

add_action("admin_menu","CrearMenu");

function CrearMenu(){
    add_menu_page(
        "Trasnportes Urbanas",
        "Trasnportes Urbanos",
        "manage_options",
        plugin_dir_path(__FILE__)."Admin/listas.php",
        null,
        plugin_dir_url(__FILE__).'Admin/Img/car.png',
        1);
}

function CrearContenido(){
    echo "<h1>This.contenido</h1>";
}


function AddBoostrapJs($hook){
    if($hook !="Transporte_Urbano/Admin/listas.php")return;
    wp_enqueue_script(
        "booststrapjs",
        plugins_url("Admin/Boostrap/bootstrap.min.js",__FILE__),array("jquery"));
}

add_action("admin_enqueue_scripts","AddBoostrapJs");
function AddBoostrapCss($hook){
    if($hook !="Transporte_Urbano/Admin/listas.php")return;
    wp_enqueue_style(
        "booststrapcss",
        plugins_url("Admin/Boostrap/bootstrap.min.css",__FILE__));
}
add_action("admin_enqueue_scripts","AddBoostrapCss");
function AddJs($hook){
    
    if($hook !="Transporte_Urbano/Admin/listas.php")return;
    wp_enqueue_script(
        "jsexterno",
        plugins_url("Admin/Js/listas.js",__FILE__),array("jquery"));
} 
add_action("admin_enqueue_scripts","AddJs");


add_shortcode('propietario', "mostrar_propietario");
 function mostrar_propietario() {
    global $wpdb;

    $sql="SELECT * FROM `wp_vacante_transporte_urbano`";
    $listas= $wpdb->get_results($sql,ARRAY_A);
     if(empty($listas))$listas=array();
     
     echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
     echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
     echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>';
     echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    
     
    

    
    

     echo '<div class="container">';

        echo '<div class="row bg-danger my-4 py-4">';
            echo '<div class="col-md-12">';
                echo '<div class="row bg-success justify-content-between">';
                    echo '<div class="col-md-3 bg-primary text-center"> Hola </div>';
                    echo '<div class="col-md-3 bg-primary"> Hola </div>';
                echo '</div>';
            echo '</div>';

        echo '</div>';
    
     /*
     foreach ($listas as $key => $value) {
        echo '<div class="row bg-danger my-4 py-4">';
            echo '<div class="col-md-6">'.$value['TIPO_CARROCERIA'].'</div>';
            
        echo '</div>';
      
      
     */
     echo '</div>';

 }



 function ocultar_plugins_para_usuario_especifico() {
   
    global $wp_list_table;
    $user = wp_get_current_user();

    if (in_array('stevenawd', $user->roles)) {
        $plugins_a_mostrar = array('Transporte Urbano');
        $output = '';
        $output .= '<style>.wp-list-table.plugins tr { display: none; }</style>';
        foreach($wp_list_table->items as $key => $val) {
            if (!in_array($val['Name'], $plugins_a_mostrar)) {
                unset($wp_list_table->items[$key]);
            }
        }
        echo $output;
    }
}
add_action('admin_head-plugins.php', 'ocultar_plugins_para_usuario_especifico');