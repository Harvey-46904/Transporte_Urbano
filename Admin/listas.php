<?php
 global $wpdb;

$tabla ="wp_Vacante_Transporte_Urbano";



if($_SERVER["REQUEST_METHOD"] =="POST"){
  $UIDVACANTE=$_POST["Uid_vacante"];
  $TIPO_VEHICULO= $_POST["TIPO_VEHICULO"];
  $TIPO_CARROCERIA= $_POST["TIPO_CARROCERIA"];
  $MODELO_VEHICULO= $_POST["MODELO_VEHICULO"];
  $DIRECCION_CARGUE= $_POST["DIRECCION_CARGUE"];
  $DESTINO=$_POST["DESTINO"];
  $CONTACTO= $_POST["CONTACTO"];
  $TELEFONICO= $_POST["TELEFONICO"];
  $COMPROMISO_CARGUE= $_POST["COMPROMISO_CARGUE"];
  $TIPO_CARGA_GENERAL= $_POST["TIPO_CARGA_GENERAL"];
  $TIPO_CARGA_GRANEL= $_POST["TIPO_CARGA_GRANEL"];
  $CARGUE_DESCARGUE_CLIENTE= $_POST["CARGUE_DESCARGUE_CLIENTE"];
  $CARGUE_DESCARGUE_TRANSPORTADORA= $_POST["CARGUE_DESCARGUE_TRANSPORTADORA"];
  $CANTIDAD= $_POST["CANTIDAD"];
  $PESO= $_POST["PESO"];
  $VOLUMEN= $_POST["VOLUMEN"];
  $CARGA_SUELTA= $_POST["CARGA_SUELTA"];
  $CONT20= $_POST["CONT20"];
  $CONT40= $_POST["CONT40"];
  $FECHA_COMPROMISO= $_POST["FECHA_COMPROMISO"];
  $FLETE= $_POST["FLETE"];
  $OBSERVACIONES= $_POST["OBSERVACIONES"];
  $datos=[
    'UIDVACANTE' =>$UIDVACANTE,
    'TIPO_VEHICULO' => $TIPO_VEHICULO ,
    'TIPO_CARROCERIA' => $TIPO_CARROCERIA,
    'MODELO_VEHICULO' => $MODELO_VEHICULO,
    'DIRECCION_CARGUE' => $DIRECCION_CARGUE,
    'DESTINO'=>$DESTINO,
    'CONTACTO' => $CONTACTO,
    'TELEFONICO' => $TELEFONICO,
    'COMPROMISO_CARGUE' => $COMPROMISO_CARGUE,
    'TIPO_CARGA_GENERAL' => $TIPO_CARGA_GENERAL,
    'TIPO_CARGA_GRANEL' => $TIPO_CARGA_GRANEL,
    'CARGUE_DESCARGUE_CLIENTE' => $CARGUE_DESCARGUE_CLIENTE,
    'CARGUE_DESCARGUE_TRANSPORTADORA' => $CARGUE_DESCARGUE_TRANSPORTADORA,
    'CANTIDAD' => $CANTIDAD,
    'PESO' => $PESO ,
    'VOLUMEN' => $VOLUMEN,
    'CARGA_SUELTA' => $CARGA_SUELTA,
    'CONT20' => $CONT20,
    'CONT40' => $CONT40,
    'FECHA_COMPROMISO' => $FECHA_COMPROMISO ,
    'FLETE' => $FLETE,
    'OBSERVACIONES' => $OBSERVACIONES
  ];

  
  $wpdb->insert($tabla,$datos);
    echo "Datos Guardados Correctamente";
 }

 $sql="SELECT * FROM `wp_Vacante_Transporte_Urbano`";
 $listas= $wpdb->get_results($sql,ARRAY_A);
  if(empty($listas))$listas=array();
?>
<div class="wrap">
    <h1 class="wp-heading-inline">Gestor  Vacantes Transportadores</h1>
    <a class="page-title-action" id="modal_new">Nueva Vacante</a>
    <br><br>
    <script>

      function guardar_id(id){
        id_guardado=id;
      }
 
    </script>
    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <th>Id Vacante</th>
            <th>Vehículo</th>
            <th>Carroceria</th>
            <th>Fecha</th>
           
            <th class="text-center">Eliminar</th>
        </thead>
        <tbody id="the-list">
            <?php
            foreach($listas as $key => $value){
                $id=$value["Vacante_id"];
                $vehiculo=$value["TIPO_VEHICULO"];
                $carroceria=$value["TIPO_CARROCERIA"];
                $fecha=$value["FECHA_COMPROMISO"];
                $uid=$value["UIDVACANTE"];
               
            ?>
            <tr>
                <td><?php echo $uid; ?></td>
                <td><?php echo $vehiculo; ?></td>
                <td><?php echo $carroceria; ?></td>
                <td><?php echo $fecha; ?></td>
               
                <td class="text-center "><button class="btn btn-danger eliminar" id="<?php echo $id?>" onclick="guardar_id(<?php echo $id?>)" >Eliminar</button></td>
            </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalnuevo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Vacante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" >
      <div class="form-group">
            <label for="exampleFormControlInput1">ID vacante</label>
            <input type="text" class="form-control"  placeholder="Id vacante" name="Uid_vacante" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de Vehículo</label>
            <select class="form-control" id="exampleFormControlSelect1" name="TIPO_VEHICULO">
              <option>Carry</option>
              <option>Camioneta</option>
              <option>Nhr</option>
              <option>Turbo</option>
              <option>Sencillo</option>
              <option>Doble Troque</option>
              <option>Patineta</option>
              <option>Tractomula</option>
              <option>Camabaja</option>
              <option>Montacarga</option>
              <option> Motorizado</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo Carroceria</label>
            <select class="form-control" name="TIPO_CARROCERIA">
                <option>N/A</option>
                <option>CARROZADO</option>
                <option>FURGONADO</option>
                <option>PLANCHA</option>
                <option>REFRIGERADO</option>
                <option>FURGONADO CON PLATAFORMA</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Módelo de Vehículo</label>
            <input type="text" class="form-control"  placeholder="Módelo de Vehículo" name="MODELO_VEHICULO" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Origen</label>
            <input type="text" class="form-control"  placeholder="Origen" name="DIRECCION_CARGUE" >
          </div>   
          <div class="form-group">
            <label for="exampleFormControlInput1">Destino</label>
            <input type="text" class="form-control"  placeholder="Destino" name="DESTINO" >
          </div>  
          <div class="form-group">
            <label for="exampleFormControlInput1">Contacto</label>
            <input type="text" class="form-control"  placeholder="Contacto" name="CONTACTO" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Teléfono</label>
            <input type="text" class="form-control"  placeholder="Teléfono" name="TELEFONICO" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Compromiso de Cargue</label>
            <input type="datetime-local" class="form-control"  placeholder="Compromiso de Cargue" name="COMPROMISO_CARGUE" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Tipo de Carga General</label>
            <input type="text" class="form-control"  placeholder="Tipo de Carga General" name="TIPO_CARGA_GENERAL" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Tipo de Carga Granel</label>
            <input type="text" class="form-control"  placeholder="Tipo de Carga Granel" name="TIPO_CARGA_GRANEL" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Carge/Descarge Cliente</label>
            <input type="text" class="form-control"  placeholder="Carge/Descarge Cliente" name="CARGUE_DESCARGUE_CLIENTE" >
          </div>  

          <div class="form-group">
            <label for="exampleFormControlInput1">Carge/Descarge Transportadora</label>
            <input type="text" class="form-control"  placeholder="Carge/Descarge Transportadora" name="CARGUE_DESCARGUE_TRANSPORTADORA" >
          </div>  


          <div class="form-group">
            <label for="exampleFormControlInput1">Cantidad</label>
            <input type="text" class="form-control"  placeholder="Cantidad" name="CANTIDAD" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Peso</label>
            <input type="text" class="form-control"  placeholder="Peso" name="PESO" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Volumen</label>
            <input type="text" class="form-control"  placeholder="Volumen" name="VOLUMEN" >
          </div>    
          <div class="form-group">
            <label for="exampleFormControlInput1">Carga Suelta</label>
            <input type="text" class="form-control"  placeholder="Carga Suelta" name="CARGA_SUELTA" >
          </div>   
          <div class="form-group">
            <label for="exampleFormControlInput1">Cont 20</label>
            <input type="text" class="form-control"  placeholder="Cont 20" name="CONT20" >
          </div>   
          <div class="form-group">
            <label for="exampleFormControlInput1">Cont 40</label>
            <input type="text" class="form-control"  placeholder="Cont 40" name="CONT40" >
          </div>   
          <div class="form-group">
            <label for="exampleFormControlInput1">Fecha de Compromiso</label>
            <input type="datetime-local" class="form-control"  placeholder="Fecha de compromiso" name="FECHA_COMPROMISO" >
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Flete</label>
            <input type="text" class="form-control"  placeholder="Flete" name="FLETE" >
          </div>   


          <div class="form-group">
            <label for="exampleFormControlTextarea1">Observaciones</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="OBSERVACIONES"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>