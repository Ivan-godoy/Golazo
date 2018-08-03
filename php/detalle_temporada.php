<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: temporada.php");
    exit;
}
$idtemporada = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM temporada WHERE id_temporada = '{$idtemporada}'");
    $regresion = $pdo->exec("ALTER TABLE temporada AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se elimino Temporada";
    header("Location:detalle_temporada.php");
    exit;
}
?>