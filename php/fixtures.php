<?php
require '../conexion.php';
$equipos1 = $pdo->query("SELECT id_equipos"
    ." FROM equipos",PDO::FETCH_ASSOC);
$equipos = [];
foreach ($equipos1 as $e){
    $equipos[] = $e['id_equipos'];
}

$partidos = [];
$num_euipos = count($equipos);
$num_semanas = count($equipos)-1;
$mitad_equipos = ($num_euipos-1)/2;

for($x=0;$x<$num_semanas;$x++){
     for($i=0;$i<$mitad_equipos;$i++){
        $equipoLocal = $equipos[$mitad_equipos - $i];
        $equipoVisita = $equipos[$mitad_equipos + $i + 1];
        $resultado[$equipoLocal][$x] = $equipoVisita;
        $resultado[$equipoVisita][$x] = $equipoLocal;
        $guardar = $pdo->exec("INSERT INTO fixture(equipo_local, equipo_visitante, Id_temporada) "
            ." VALUES ('{$resultado[$equipoLocal][$x]}','{$resultado[$equipoVisita][$x]}',1)");
        $partidos[] = [$resultado[$equipoLocal][$x],$resultado[$equipoVisita][$x]];
     }
    $temporal = $equipos[1];
    for($i = 1;$i<$num_euipos-1;$i++){
        $equipos[$i] =$equipos[$i+1];
    }
    $equipos[$num_euipos-1] = $temporal;
}
$contador = $mitad_equipos+1;
for($x=0;$x<count($partidos);$x++) {
    $guardar = $pdo->exec("INSERT INTO fixture(equipo_local, equipo_visitante, Id_temporada) "
        . " VALUES ('{$partidos[$x][1]}','{$partidos[$x][0]}',1)");
}
?>