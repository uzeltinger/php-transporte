<?php
require 'lib/conn.inc.php';
$sql = <<<EOT
SELECT * FROM cartadeporte ORDER BY id DESC
EOT;
$sth = $db->prepare("SELECT * FROM cartadeporte ORDER BY id DESC");
$sth->execute();
$result = $sth->fetchAll();
$db=null;
//print_r( $result );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cartas de Porte</title>
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="listado">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cartas de Porte</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tabla_pedidos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Chofer</th>
                                        <th>flete_monto_neto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($result as $resultado) {
                                        echo "<tr>";
                                        echo "<td>".$resultado['remito_numero']."</td>";
                                        echo "<td>".$resultado['fecha']."</td>";
                                        echo "<td>".$resultado['remitente_nombre']."</td>";
                                        echo "<td>".$resultado['destinatario_nombre']."</td>";
                                        echo "<td>".$resultado['chofer_nombre']."</td>";
                                        echo "<td>".$resultado['flete_monto_neto']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        <a class="btn btn-success btn-lg btn-block" href="cartadeporte_nueva.php">Nueva Carta de Porte</a>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
</body>
</html>