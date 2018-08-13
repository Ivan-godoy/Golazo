<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: estadio.php");
    exit;
}
$idestadios = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM estadios WHERE id_estadios = '{$idestadios}'");
    $regresion = $pdo->exec("ALTER TABLE estadios AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se elimino Temporada";
    header("Location:detalle_estadio.php");
    exit;
}
?>