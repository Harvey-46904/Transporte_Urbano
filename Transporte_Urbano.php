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
        TIPO_CARGA_GENERAL VARCHAR(45) NULL,
        TIPO_CARGA_GRANEL VARCHAR(45) NULL,
        CARGUE_DESCARGUE_CLIENTE VARCHAR(45) NULL,
        CARGUE_DESCARGUE_TRANSPORTADORA VARCHAR(45) NULL,
        CANTIDAD VARCHAR(45) NULL,
        PESO VARCHAR(45) NULL,
        VOLUMEN VARCHAR(45) NULL,
        CARGA_SUELTA VARCHAR(45) NULL,
        CONT20 VARCHAR(45) NULL,
        CONT40 VARCHAR(45) NULL,
        FECHA_COMPROMISO VARCHAR(45) NULL,
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
     /*
     echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
     echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
     echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>';
     echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    */
     echo '  <style>
     .celda10 {
         width: 10%;
     }

     .celda20 {
         width: 20%;
     }

     .celda30 {
         width: 30%;
     }

     .celda40 {
         width: 40%;
     }
 </style>';
   echo '
   <script>
     function saludar(
        TIPO_VEHICULO,
        TIPO_CARROCERIA,
        MODELO_VEHICULO,
        DIRECCION_CARGUE,
        CONTACTO,
        TELEFONICO,
        COMPROMISO_CARGUE,
        TIPO_CARGA_GENERAL,
        TIPO_CARGA_GRANEL,
        CARGUE_DESCARGUE_CLIENTE,
        CARGUE_DESCARGUE_TRANSPORTADORA,
        CANTIDAD,
        PESO,
        VOLUMEN,
        CARGA_SUELTA,
        CONT20,
        CONT40,
        FECHA_COMPROMISO,
        FLETE,
        OBSERVACIONES){

            $("#TIPO_VEHICULO").text( TIPO_VEHICULO);
            $("#TIPO_CARROCERIA").text(TIPO_CARROCERIA);
            $("#MODELO_VEHICULO").text(MODELO_VEHICULO);
            $("#DIRECCION_CARGUE").text(DIRECCION_CARGUE);
            $("#CONTACTO").text(CONTACTO);
            $("#TELEFONICO").text(TELEFONICO);
            $("#COMPROMISO_CARGUE").text(COMPROMISO_CARGUE);
            $("#TIPO_CARGA_GENERAL").text(TIPO_CARGA_GENERAL);
            $("#TIPO_CARGA_GRANEL").text(TIPO_CARGA_GRANEL);
            $("#CARGUE_DESCARGUE_CLIENTE").text(CARGUE_DESCARGUE_CLIENTE);
            $("#CARGUE_DESCARGUE_TRANSPORTADORA").text(CARGUE_DESCARGUE_TRANSPORTADORA);
            $("#CANTIDAD").text(CANTIDAD);
            $("#PESO").text(PESO);
            $("#VOLUMEN").text(VOLUMEN);
            $("#CARGA_SUELTA").text(CARGA_SUELTA);
            $("#CONT20").text(CONT20);
            $("#CONT40").text(CONT40);
            $("#FECHA_COMPROMISO").text(FECHA_COMPROMISO);
            $("#FLETE").text(FLETE);
            $("#OBSERVACIONES").text(OBSERVACIONES);
     }
    </script>
   ' ;

    
    

     echo '<div class="container">';
       
        echo '<div class="row  my-4 py-4">';
           
          
     
     foreach ($listas as $key => $value) {
        $TIPO_VEHICULO= $value["TIPO_VEHICULO"];
        $TIPO_VEHICULO=$value["TIPO_VEHICULO"];
        $TIPO_CARROCERIA=$value["TIPO_CARROCERIA"];
        $MODELO_VEHICULO=$value["MODELO_VEHICULO"];
        $DIRECCION_CARGUE=$value["DIRECCION_CARGUE"];
        $CONTACTO=$value["CONTACTO"];
        $TELEFONICO=$value["TELEFONICO"];
        $COMPROMISO_CARGUE=$value["COMPROMISO_CARGUE"];
        $TIPO_CARGA_GENERAL=$value["TIPO_CARGA_GENERAL"];
        $TIPO_CARGA_GRANEL=$value["TIPO_CARGA_GRANEL"];
        $CARGUE_DESCARGUE_CLIENTE=$value["CARGUE_DESCARGUE_CLIENTE"];
        $CARGUE_DESCARGUE_TRANSPORTADORA=$value["CARGUE_DESCARGUE_TRANSPORTADORA"];
        $CANTIDAD=$value["CANTIDAD"];
        $PESO=$value["PESO"];
        $VOLUMEN=$value["VOLUMEN"];
        $CARGA_SUELTA=$value["CARGA_SUELTA"];
        $CONT20=$value["CONT20"];
        $CONT40=$value["CONT40"];
        $FECHA_COMPROMISO=$value["FECHA_COMPROMISO"];
        $FLETE=$value["FLETE"];
        $OBSERVACIONES=$value["OBSERVACIONES"];
         echo '<div class="col-md-4 ">';
                echo '<div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Nueva Vacante</h5>
                <h6 class="card-subtitle mb-2 text-muted">'.$value["FECHA_COMPROMISO"].'</h6>
                <p class="card-text">'.$value["DIRECCION_CARGUE"].'</p>
                <a href="#" class="card-link"><button type="button" onclick="saludar(
                    `'.$TIPO_VEHICULO.'`,
                    `'.$TIPO_CARROCERIA.'`,
                    `'.$MODELO_VEHICULO.'`,
                    `'.$DIRECCION_CARGUE.'`,
                    `'.$CONTACTO.'`,
                    `'.$TELEFONICO.'`,
                    `'.$COMPROMISO_CARGUE.'`,
                    `'.$TIPO_CARGA_GENERAL.'`,
                    `'.$TIPO_CARGA_GRANEL.'`,
                    `'.$CARGUE_DESCARGUE_CLIENTE.'`,
                    `'.$CARGUE_DESCARGUE_TRANSPORTADORA.'`,
                    `'.$CANTIDAD.'`,
                    `'.$PESO.'`,
                    `'.$VOLUMEN.'`,
                    `'.$CARGA_SUELTA.'`,
                    `'.$CONT20.'`,
                    `'.$CONT40.'`,
                    `'.$FECHA_COMPROMISO.'`,
                    `'.$FLETE.'`,
                    `'.$OBSERVACIONES.'`
                )" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Detalles
                </button> </a>
               
                </div>
                </div>'; 
            
            echo '</div>';
     }
      
      
        echo '</div>';
     echo '</div>';


     echo '  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle">Vacante</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
         <div class="container mt-5">
         <table class=" table table-bordered border-dark table-hover">
             <thead>
                 <!--- <tr>
                 <th scope="col">#</th>
                 <th scope="col">First</th>
                 <th scope="col">Last</th>
                 <th scope="col">Handle</th>
               </tr> -->
             </thead>
             <tbody>
               <tr>
                 
                 <td class="celda20 table-success bg-info">TIPO DE VEHICULO</td>
                 <td class="celda40" id="TIPO_VEHICULO">H</td>
                 
               </tr>
              
             </tbody>
           </table>
     
           <table class=" table table-bordered border-dark table-hover">
            
             <tbody>
               <tr>
                 
                 <td class="celda20 table-success bg-info">TIPO DE CARROCERIA</td>
                 <td class="celda40" id="TIPO_CARROCERIA">H</td>
                 
               </tr>
              
             </tbody>
           </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda40 table-success bg-info">DIRECCION DE CARGUE / CONTACTO / No. TELEFONICO</td>
                         <td class="celda20"  > <b> Contactos:</b><p id="CONTACTO"></p> </td>
                         <td class="celda20"><b> Direccion: </b><p id="DIRECCION_CARGUE"></p> </td>
                         <td class="celda20" ><b> Tel/Cel: </b><p id="TELEFONICO"></p> </td>
                       
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda30 table-success bg-info">COMPROMISO DE CARGUE</td>
                         <td class="celda20" id=""> <b> Fecha:</b><p id="COMPROMISO_CARGUE"></p></td>
        
                         
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda20 table-success bg-info">TIPO DE CARGA</td>
                         <td class="celda20" ><b> General:</b><p id="TIPO_CARGA_GENERAL"></p></td>
                         <td class="celda20" ><b> Granel:</b><p id="TIPO_CARGA_GRANEL"></p></td>
                        
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda40 table-success bg-info">CARGUE Y  DESCARGUE POR CUENTA DEL CLIENTE Y/O TRANSPORTADORA</td>
                         <td class="celda20" id="TIPO_VEHICULO"><b> Cliente:</b><p id="CARGUE_DESCARGUE_CLIENTE"></p></td>
                         <td class="celda20" id="TIPO_VEHICULO"><b> Transportadora:</b><p id="CARGUE_DESCARGUE_TRANSPORTADORA"></p></td>
                         
                         
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda20 table-success bg-info">DIMENSIONES CARGA</td>
                         <td class="celda20" ><b> Cant:</b><p id="CANTIDAD"></p></td>
                         <td class="celda20"><b> Peso:</b><p id="PESO"></p></td>
                         <td class="celda20" ><b> Volumen:</b><p id="VOLUMEN"></p></td>
                         
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda30 table-success bg-info">CONT.20 - CARGA SUELTA</td>
                         <td class="celda20"><b> Carga Suelta:</b><p id="CARGA_SUELTA"></p></td>
                         <td class="celda20" > <b> CONT. 20:</b><p id="CONT20"></p></td>
                         <td class="celda20" > <b>CONT. 40:</b><p id="CONT40"></p></td>
                         
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda30 table-success bg-info">COMPROMISO DE ENTREGA EN DESTINO</td>
                         <td class="celda20"><b>Fecha:</b><p id="FECHA_COMPROMISO"></p></td>
                      
                        
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda10 table-success bg-info">FLETE</td>
                         <td class="celda40" id="FLETE">H</td>
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
             <table class=" table table-bordered border-dark table-hover">
             
                 <tbody>
                     <tr>
                         
                         <td class="celda20 table-success bg-info">OBSERVACIONES A TENER EN CUENTA</td>
                         <td class="celda40" id="OBSERVACIONES">H</td>
                         
                     </tr>
                 
                 </tbody>
                 
             </table>
     
     
     
     </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
         </div>
       </div>
     </div>
   </div>';

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