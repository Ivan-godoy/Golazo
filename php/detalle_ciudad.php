<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: ciudad.php");
    exit;
}
$idciudad = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM ciudad WHERE id_ciudad = '{$idciudad}'");
    $regresion = $pdo->exec("ALTER TABLE ciudad AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se elimino la Ciudad";
    header("Location:detalle.php");
    exit;
}
?>