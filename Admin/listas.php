<?php
 global $wpdb;

$tabla ="wp_vacante_transporte_urbano";

$TIPO_VEHICULO= isset($_POST["TIPO_VEHICULO"]);
$TIPO_CARROCERIA= isset($_POST["TIPO_CARROCERIA"]);
$MODELO_VEHICULO= isset($_POST["MODELO_VEHICULO"]);
$DIRECCION_CARGUE= isset($_POST["DIRECCION_CARGUE"]);
$CONTACTO= isset($_POST["CONTACTO"]);
$TELEFONICO= isset($_POST["TELEFONICO"]);
$COMPROMISO_CARGUE= isset($_POST["COMPROMISO_CARGUE"]);
$TIPO_CARGA= isset($_POST["TIPO_CARGA"]);
$CARGUE_DESCARGUE= isset($_POST["CARGUE_DESCARGUE"]);
$DIMENSIONES_CARGA= isset($_POST["DIMENSIONES_CARGA"]);
$PESO= isset($_POST["PESO"]);
$FECHA= isset($_POST["FECHA"]);
$FLETE= isset($_POST["FLETE"]);
$OBSERVACIONES= isset($_POST["OBSERVACIONES"]);
 if($TIPO_VEHICULO!= ""){



  
  $datos=[
    'TIPO_VEHICULO' => $TIPO_VEHICULO,
    'TIPO_CARROCERIA' => $TIPO_CARROCERIA,
    'MODELO_VEHICULO' => $MODELO_VEHICULO,
    'DIRECCION_CARGUE' => $DIRECCION_CARGUE,
    'CONTACTO' => $CONTACTO,
    'TELEFONICO' => $TELEFONICO,
    'COMPROMISO_CARGUE' => $COMPROMISO_CARGUE,
    'TIPO_CARGA' => $TIPO_CARGA,
    'CARGUE_DESCARGUE' => $CARGUE_DESCARGUE,
    'DIMENSIONES_CARGA' => $DIMENSIONES_CARGA,
    'PESO' => $PESO,
    'FECHA' => $FECHA,
    'FLETE' => $FLETE,
    'OBSERVACIONES' => $OBSERVACIONES
  ];
  $wpdb->insert($tabla,$datos);
    echo "Datos Guardados Correctamente";
 }

 $sql="SELECT * FROM `wp_vacante_transporte_urbano`";
 $listas= $wpdb->get_results($sql,ARRAY_A);
  if(empty($listas))$listas=array();
?>
<div class="wrap">
    <h1 class="wp-heading-inline">Gestor  Vacantes Transportadores</h1>
    <a class="page-title-action" id="modal_new">Nueva Vacante</a>
    <br><br>
    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <th>Id Vacante</th>
            <th>Vehículo</th>
            <th>Carroceria</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </thead>
        <tbody id="the-list">
            <?php
            foreach($listas as $key => $value){
                $id=$value["Vacante_id"];
                $vehiculo=$value["TIPO_VEHICULO"];
                $carroceria=$value["TIPO_CARROCERIA"];
                $fecha=$value["FECHA"];
               
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $vehiculo; ?></td>
                <td><?php echo $carroceria; ?></td>
                <td><?php echo $fecha; ?></td>
                <td><a class="page-title-action">Ampliar</a></td>
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
      <form method="POST">
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
            <input type="text" class="form-control"  placeholder="Módelo de Vehículo" name="MODELO_VEHICULO">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Dirección de Cargue</label>
            <input type="text" class="form-control"  placeholder="Dirección de cargue" name="DIRECCION_CARGUE">
          </div>   
          <div class="form-group">
            <label for="exampleFormControlInput1">Contacto</label>
            <input type="text" class="form-control"  placeholder="Contacto" name="CONTACTO">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Teléfono</label>
            <input type="text" class="form-control"  placeholder="Teléfono" name="TELEFONICO">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Compromiso de Cargue</label>
            <input type="text" class="form-control"  placeholder="Compromiso de Cargue" name="COMPROMISO_CARGUE">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Tipo de Carga</label>
            <input type="text" class="form-control"  placeholder="Tipo de Carga" name="TIPO_CARGA">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Cargue o Descargue</label>
            <select class="form-control" name="CARGUE_DESCARGUE">
                <option>Cargue</option>
                <option>Descargue</option>
            </select>
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Dimenciones de Carga</label>
            <input type="text" class="form-control"  placeholder="Dimenciones de Carga" name="DIMENSIONES_CARGA">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Peso</label>
            <input type="text" class="form-control"  placeholder="Peso" name="PESO">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Fecha</label>
            <input type="text" class="form-control"  placeholder="Fecha" name="FECHA">
          </div>   

          <div class="form-group">
            <label for="exampleFormControlInput1">Flete</label>
            <input type="text" class="form-control"  placeholder="Flete" name="FLETE">
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