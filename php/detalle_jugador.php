<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: jugador.php");
    exit;
}
$idequipo = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'eliminar'){
    $filas_afectadas = $pdo->exec("DELETE FROM equipo WHERE id_equipo = '{$idequipo}'");
    $regresion = $pdo->exec("ALTER TABLE equipo AUTO_INCREMENT = 1");
    echo $filas_afectadas;
    $mensaje = "Se Elimino el Equipo";
    header("Location:detalle_equipo.php");
    exit;
}
?>