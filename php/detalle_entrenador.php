<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: entrenador.php");
    exit;
}
$identrenador = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM entrenador WHERE id_entrenador= '{$identrenador}'");
    $regresion = $pdo->exec("ALTER TABLE entrenador AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se Elimino el Equipo";
    header("Location:detalle_entrenador.php");
    exit;
}
?>