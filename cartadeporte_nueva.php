<?php
require 'lib/conn.inc.php';
if($id = $_GET['id']){
    echo $id;
}
/* si se oprimió "guardar" */
if($_POST['guardar']){
/*obtencion de fecha*/ 
$fecha=(isset($_POST['fecha'])&& !empty($_POST['fecha']))?$_POST['fecha']:date("Y-m-d");
$fechaEspanol = date("d/m/Y", strtotime($fecha));
/* fin de obtencion de fecha */
/*inicio de validacion*/
$remitente_numero_remito=(isset($_POST['remitente_numero_remito'])&& !empty($_POST['remitente_numero_remito']))?$_POST['remitente_numero_remito']:"";
$lugar_de_carga=(isset($_POST['lugar_de_carga'])&& !empty($_POST['lugar_de_carga']))?$_POST['lugar_de_carga']:"";
$ciudad_de_carga=(isset($_POST['ciudad_de_carga'])&& !empty($_POST['ciudad_de_carga']))?$_POST['ciudad_de_carga']:"";
$remitente_nombre=(isset($_POST['remitente_nombre'])&& !empty($_POST['remitente_nombre']))?$_POST['remitente_nombre']:"";
$remitente_cuit=(isset($_POST['remitente_cuit'])&& !empty($_POST['remitente_cuit']))?$_POST['remitente_cuit']:"";
$remitente_direccion=(isset($_POST['remitente_direccion'])&& !empty($_POST['remitente_direccion']))?$_POST['remitente_direccion']:"";
$remitente_ciudad=(isset($_POST['remitente_ciudad'])&& !empty($_POST['remitente_ciudad']))?$_POST['remitente_ciudad']:"";
$destinatario_nombre=(isset($_POST['destinatario_nombre'])&& !empty($_POST['destinatario_nombre']))?$_POST['destinatario_nombre']:"";
$destinatario_cuit=(isset($_POST['destinatario_cuit'])&& !empty($_POST['destinatario_cuit']))?$_POST['destinatario_cuit']:"";
$destinatario_direccion=(isset($_POST['destinatario_direccion'])&& !empty($_POST['destinatario_direccion']))?$_POST['destinatario_direccion']:"";
$destinatario_ciudad=(isset($_POST['destinatario_ciudad'])&& !empty($_POST['destinatario_ciudad']))?$_POST['destinatario_ciudad']:"";
$camion_patente=(isset($_POST['camion_patente'])&& !empty($_POST['camion_patente']))?$_POST['camion_patente']:"";
$camion_modelo=(isset($_POST['camion_modelo'])&& !empty($_POST['camion_modelo']))?$_POST['camion_modelo']:"";
$acoplado_patente=(isset($_POST['acoplado_patente'])&& !empty($_POST['acoplado_patente']))?$_POST['acoplado_patente']:"";
$acoplado_modelo=(isset($_POST['acoplado_modelo'])&& !empty($_POST['acoplado_modelo']))?$_POST['acoplado_modelo']:"";
$chofer_nombre=(isset($_POST['chofer_nombre'])&& !empty($_POST['chofer_nombre']))?$_POST['chofer_nombre']:"";
$chofer_documento=(isset($_POST['chofer_documento'])&& !empty($_POST['chofer_documento']))?$_POST['chofer_documento']:"";
$detalle=(isset($_POST['detalle'])&& !empty($_POST['detalle']))?$_POST['detalle']:"";
$flete_monto_neto=(isset($_POST['flete_monto_neto'])&& !empty($_POST['flete_monto_neto']))?$_POST['flete_monto_neto']:"";
/* fin de validacion */


/*obtener el numero de carta porte siguiente */
$sql = <<<EOT
SELECT MAX(id) as maximo FROM cartadeporte 
EOT;
$rs=$db->query($sql)->fetch(PDO::FETCH_ASSOC);
$siguiente_id_carta_de_porte=((int)($rs['maximo']))+1;
$cantidad_de_digitos=(int)strlen((string)(($siguiente_id_carta_de_porte)));
$numero_maximo =8;
$siguiente_numero_carta_porte=(string)($siguiente_id_carta_de_porte);
While (($numero_maximo-$cantidad_de_digitos)>0){
	$siguiente_numero_carta_porte="0".$siguiente_numero_carta_porte;
    $numero_maximo=$numero_maximo-1;
}
$rs=null;

/* fin de obtencion de numero de carta de porte */

//echo $siguiente_numero_carta_porte;

/*guardado de datos*/
$sql2 = "INSERT INTO cartadeporte (`remito_numero`, `remitente_numero_remito`, `lugar_de_carga`, `ciudad_de_carga`, `remitente_nombre`, `remitente_cuit`, `remitente_direccion`, `remitente_ciudad`, `destinatario_nombre`, `destinatario_cuit`, `destinatario_direccion`, `destinatario_ciudad`, `camion_patente`, `camion_modelo`, `acoplado_patente`, `acoplado_modelo`, `chofer_nombre`, `chofer_documento`, `detalle`, `flete_monto_neto`, `fecha`) VALUES ('$siguiente_numero_carta_porte','$remitente_numero_remito','$lugar_de_carga','$ciudad_de_carga','$remitente_nombre','$remitente_cuit','$remitente_direccion','$remitente_ciudad','$destinatario_nombre','$destinatario_cuit','$destinatario_direccion','$destinatario_ciudad','$camion_patente','$camion_modelo','$acoplado_patente','$acoplado_modelo','$chofer_nombre','$chofer_documento','$detalle','$flete_monto_neto','$fecha')";
$result = $db->exec($sql2);
$insertId = $db->lastInsertId();
/* fin guardado de datos*/
$res=null;
$db=null;
/*ceirre de cesion php mysql*/
//echo $sql2;
}




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Carta de Porte</title>
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>



<form action="" method="post">

<div class="container">
    <fieldset>
        <legend>Nueva Carta de Porte</legend>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input name="fecha" type="date" id="fecha" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="remitente_numero_remito">Remito numero:</label>
                <input name="remitente_numero_remito" type="text" id="remitente_numero_remito" size="20" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="ciudad_de_carga">Lugar de Carga</label>
                <select name="ciudad_de_carga" id="ciudad_de_carga" class="form-control">
                <option value="Bahia Blanca">Bahia Blanca</option>
                <option value="Buenos Aires">Buenos Aires</option>
                </select>
            </div>
        </div>
    </fieldset>
</div>


<div class="container">
    <fieldset>
        <legend>Remitente</legend>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="remitente_nombre">Nombre:</label>
                <input name="remitente_nombre" type="text" id="remitente_nombre" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="remitente_cuit">CUIT:</label>
                <input name="remitente_cuit" type="text" id="remitente_cuit" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="remitente_direccion">Direccion:</label>
                <input name="remitente_direccion" type="text" id="remitente_direccion" class="form-control" />
            </div>
        </div>        
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="ciudad_de_carga">Localidad</label>
                <select name="ciudad_de_carga" id="ciudad_de_carga" class="form-control">
                    <option value="Bahia Blanca">Bahia Blanca</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Ezeiza">Ezeiza</option>
                </select>
            </div>
        </div>
    </fieldset>
</div>

<div class="container">
    <fieldset>
        <legend>Destinatario</legend>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="destinatario_nombre">Nombre:</label>
                <input name="destinatario_nombre" type="text" id="destinatario_nombre" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="destinatario_cuit">CUIT:</label>
                <input name="destinatario_cuit" type="text" id="destinatario_cuit" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="destinatario_direccion">Direccion:</label>
                <input name="destinatario_direccion" type="text" id="destinatario_direccion" class="form-control" />
            </div>
        </div>        
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label for="destinatario_ciudad">Localidad</label>
                <select name="destinatario_ciudad" id="destinatario_ciudad" class="form-control">
                    <option value="Bahia Blanca">Bahia Blanca</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Ezeiza">Ezeiza</option>
                </select>
            </div>
        </div>
    </fieldset>
</div>

<div class="container">
    <fieldset>
        <legend>Datos del Camion</legend>
        <div class="col-xs-12 col-sm-2">
            <div class="form-group">
                <label for="camion_patente">Patente Camion:</label>
                <input name="camion_patente" type="text" id="camion_patente" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="camion_modelo">Modelo Camion:</label>
                <input name="camion_modelo" type="text" id="camion_modelo" class="form-control" />
            </div>
        </div>        
        <div class="col-xs-12 col-sm-2">
            <div class="form-group">
                <label for="acoplado_patente">Patente Acoplado:</label>
                <input name="acoplado_patente" type="text" id="acoplado_patente" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="acoplado_modelo">Modelo Acoplado:</label>
                <input name="acoplado_modelo" type="text" id="acoplado_modelo" class="form-control" />
            </div>
        </div>
    </fieldset>
</div>

<div class="container">
    <fieldset>
        <legend>Datos del Chofer</legend>
        <div class="col-xs-12 col-sm-8">
            <div class="form-group">
                <label for="chofer_nombre">Nombre:</label>
                <input name="chofer_nombre" type="text" id="chofer_nombre" class="form-control" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="chofer_documento">Documento:</label>
                <input name="chofer_documento" type="text" id="chofer_documento" class="form-control" />
            </div>
        </div>        
    </fieldset>
</div>

<div class="container">
    <fieldset>
        <legend>Detalle de carga</legend>
        <div class="col-xs-12 col-sm-8">
            <div class="form-group">
                <label for="detalle">Tipo de carga:</label>
                <textarea name="detalle" id="detalle" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label for="flete_monto_neto">Flete:</label>
                <input name="flete_monto_neto" type="text" id="flete_monto_neto" class="form-control" />
            </div>
        </div>        
    </fieldset>
</div>

<div class="container">
    <div class="col-xs-12 col-sm-12">
        <input class="btn btn-success guardar" name="guardar" type="submit" value="Guardar" />
        <a class="btn btn-primary" href="cartadeporte_listado.php">Volver</a>

    </div>
</div>


</form>


    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
</body>
</html>