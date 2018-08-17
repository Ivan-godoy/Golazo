<?php
require_once '../conexion.php';

if (!isset($_GET['cod'])) {
    header("Location: tabla_fixture.php");
    exit;
}
$idfixture = $_GET["cod"];


$datos = $pdo->query("SELECT fixture.equipo_local,encuentros.nombre_equipo_local,equipo.id_estadio, fixture.equipo_visitante, encuentros.nombre_equipo_visita ,encuentros.fecha, encuentros.id_fixture, encuentros.id_temporada from encuentros "
    ." INNER JOIN fixture on encuentros.id_fixture = fixture.id_fixture INNER JOIN equipo on nombre_equipo_local = nom_equipo WHERE fixture.id_fixture = '{$idfixture}'", PDO::FETCH_ASSOC);

$informacion_partido = [];
foreach ($datos as $dato){
    $informacion_partido = $dato;
}

$filas_afectadas = $pdo->exec("INSERT INTO partido_jugado (id_estadio, id_fixture, equipo_local, equipo_visita, fecha ) VALUES ('{$informacion_partido['id_estadio']}', '{$idfixture}', '{$informacion_partido['equipo_local']}' ,'{$informacion_partido['equipo_visitante']}', '{$informacion_partido['fecha']}')");

$id_ultimo_partido_jugado = $pdo->query("select id_partido_jugado FROM partido_jugado order by id_partido_jugado desc limit 1");
$ultimo = [];
foreach ($id_ultimo_partido_jugado as $id){
    $ultimo[] = $id[$id_ultimo_partido_jugado];
}

$titulares = $pdo->query(" SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$informacion_partido['equipo_local']}' or id_equipos = '{$informacion_partido['equipo_visitante']}'", PDO::FETCH_ASSOC);

$informacion_titulares = [];
foreach ($titulares as $titu){
    $informacion_titulares = $titu[$titulares];
    $encuentro_jugador = $pdo->exec("INSERT INTO encuentro_jugador (id_partidos_jugados, id_Jugadores, id_Equipos) VALUES ('{$id[0]}', '{$titu["id_jugador"]}', '{$titu["id_equipo"]}')");
}

//$encuentro_jugador = $pdo->exec("INSERT INTO encuentro_jugador (id_partidos_jugados, id_Jugadores, id_Equipos) VALUES ('{$id[0]}', '{$id_jugador}', '{$info[0]["equipo_local"]}')");

header("location: partido_jugado.php?codigo=$idfixture") ;



