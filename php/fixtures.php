<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: temporada.php");
    exit;
}
$idtemporada = $_GET["codigo"];
if (isset($_GET['operacion']) && $_GET['operacion'] == 'crear'){
    $equipos1 = $pdo->query("SELECT id_equipo FROM equipo",PDO::FETCH_ASSOC);
    $fix = $pdo->query("SELECT * FROM fixture",PDO::FETCH_ASSOC);
    $fecha1 = $pdo->query("SELECT fecha_inicio FROM temporada WHERE id_temporada = '{$idtemporada}'",PDO::FETCH_ASSOC);
    $equipos = [];

    foreach ($equipos1 as $e){
        $equipos[] = $e['id_equipo'];
    }

    $fecha = [];
    foreach ($fecha1 as $f){
        $fecha[]=$f['fecha_inicio'];
    }

    $partidos = [];
    $num_euipos = count($equipos);
    $num_semanas = count($equipos)-1;
    $mitad_equipos = ($num_euipos-1)/2;
    $fecha2 = date($fecha[0]);
    $dias = 0;
    for($x=0;$x<$num_semanas*2;$x++){
        if($x<$num_semanas) {
            for ($i = 0; $i < $mitad_equipos; $i++) {
                $equipoLocal = $equipos[$mitad_equipos - $i];
                $equipoVisita = $equipos[$mitad_equipos + $i + 1];
                $resultado[$equipoLocal][$x] = $equipoVisita;
                $resultado[$equipoVisita][$x] = $equipoLocal;

                if ($i > $mitad_equipos / 2) {
                    $dias += 1;
                }
                $nuevafecha = strtotime($dias . 'day', strtotime($fecha2));
                $nuevafecha = date('Y-m-j', $nuevafecha);

                $guardar = $pdo->exec("INSERT INTO fixture(fecha, equipo_local, equipo_visitante, Id_temporada) "
                    . " VALUES ('{$nuevafecha}','{$resultado[$equipoLocal][$x]}','{$resultado[$equipoVisita][$x]}','{$idtemporada}')");
                $partidos[] = [$resultado[$equipoLocal][$x], $resultado[$equipoVisita][$x]];
            }

        }else{
            for ($i = 0; $i < $mitad_equipos; $i++) {
                $equipoLocal = $equipos[$mitad_equipos - $i];
                $equipoVisita = $equipos[$mitad_equipos + $i + 1];
                $resultado[$equipoLocal][$x] = $equipoVisita;
                $resultado[$equipoVisita][$x] = $equipoLocal;

                if ($i > $mitad_equipos / 2) {
                    $dias += 1;
                }
                $nuevafecha = strtotime($dias . 'day', strtotime($fecha2));
                $nuevafecha = date('Y-m-j', $nuevafecha);
                $guardar = $pdo->exec("INSERT INTO fixture(fecha, equipo_local, equipo_visitante, Id_temporada) "
                    . " VALUES ('{$nuevafecha}','{$resultado[$equipoVisita][$x]}','{$resultado[$equipoLocal][$x]}','{$idtemporada}')");
                $partidos[] = [$resultado[$equipoVisita][$x], $resultado[$equipoLocal][$x]];
            }
        }
        $dias+= 5;
        $temporal = $equipos[1];
        for($i = 1;$i<$num_euipos-1;$i++){
            $equipos[$i] =$equipos[$i+1];
        }
        $equipos[$num_euipos-1] = $temporal;
    }
    header("Location:fixtures.php");
    exit;
}
?>