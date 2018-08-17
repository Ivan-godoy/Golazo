<?php
require_once '../conexion.php';

if (!isset($_GET['codigo'])) {
    header("Location: tabla_fixture.php");
    exit;
}
$idjugador_amarilla = $_GET["codigo"];

echo $idjugador_amarilla;

