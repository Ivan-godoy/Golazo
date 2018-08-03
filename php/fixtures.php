<?php
$equipos = ["olimpia", "motagua","vida","madrid","psg","Juventus"];
$partidos = [];
$num_euipos = count($equipos);
$num_semanas = count($equipos)-1;
$mitad_equipos = ($num_euipos-1)/2;

for($x=0;$x<$num_semanas;$x++){
    echo "JORNADA".($x+1);
    echo "<br>";
    for($i=0;$i<$mitad_equipos;$i++){
        $equipoLocal = $equipos[$mitad_equipos - $i];
        $equipoVisita = $equipos[$mitad_equipos + $i + 1];
        $resultado[$equipoLocal][$x] = $equipoVisita;
        $resultado[$equipoVisita][$x] = $equipoLocal;
        $partidos[] = [$resultado[$equipoLocal][$x],$resultado[$equipoVisita][$x]];
        echo $resultado[$equipoLocal][$x]. "VS". $resultado[$equipoVisita][$x]. "<br>";
    }
    echo "<br>";
    $temporal = $equipos[1];
    for($i = 1;$i<$num_euipos-1;$i++){
        $equipos[$i] =$equipos[$i+1];
    }
    $equipos[$num_euipos-1] = $temporal;
}
$contador = $mitad_equipos+1;
for($x=0;$x<count($partidos);$x++){
    if($contador < $mitad_equipos-1){
        echo $partidos[$x][1]. "VS". $partidos[$x][0]. "<br>";
        $contador++;
    }else{
        $contador = 0;
        echo "<br>";
        echo "JORNADA".($num_euipos++);
        echo "<br>";
        echo $partidos[$x][1]. "VS". $partidos[$x][0]. "<br>";
    }
}
?>