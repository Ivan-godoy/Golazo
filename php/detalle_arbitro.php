<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: arbitro.php");
    exit;
}
$idarbitro = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM arbitro WHERE id_arbitro = '{$idarbitro}'");
    $regresion = $pdo->exec("ALTER TABLE arbitro AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se Elimino el Equipo";
    header("Location:detalle_arbitro.php");
    exit;
}
?>