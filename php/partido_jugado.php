<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: tabla_fixture.php");
    exit;
}
$idfixture = $_GET["codigo"];

$id_partido_jugado = $id_partido_jugado = $pdo->query("Select id_partido_jugado from partido_jugado where id_fixture = '{$idfixture}'", PDO::FETCH_ASSOC);
$info_partido_jugado = [];
foreach ($id_partido_jugado as $id){
    $info_partido_jugado = $id['id_partido_jugado'];
}

$datos = $pdo->query("SELECT encuentros.id_temporada,fixture.equipo_local,encuentros.nombre_equipo_local,equipo.id_estadio, fixture.equipo_visitante, encuentros.nombre_equipo_visita ,encuentros.fecha, encuentros.id_fixture, encuentros.id_temporada from encuentros "
    ." INNER JOIN fixture on encuentros.id_fixture = fixture.id_fixture INNER JOIN equipo on nombre_equipo_local = nom_equipo WHERE fixture.id_fixture = '{$idfixture}'", PDO::FETCH_ASSOC);

$resultados = $pdo->query("SELECT * FROM mostrar_resultados WHERE id_partido_jugado = '{$id['id_partido_jugado']}' ;", PDO::FETCH_ASSOC);

$equipos = $pdo->query("Select * from equipo", PDO::FETCH_ASSOC);

$info = [];
foreach ($datos as $infogoles){
    $info[] = $infogoles;
    $ingreso_goles = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_local']}'", PDO::FETCH_ASSOC);
    $ingreso_goles2 = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_visitante']}'", PDO::FETCH_ASSOC);
    $amarillas = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_local']}'", PDO::FETCH_ASSOC);
    $amarillas2 = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_visitante']}'", PDO::FETCH_ASSOC);
    $rojas = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_local']}'", PDO::FETCH_ASSOC);
    $rojas2 = $pdo->query("SELECT nom_equipo,id_equipo,nomb_jugador,id_jugador from equipo_jugador inner join equipo on id_equipos = id_equipo inner join jugador on id_jugadores = id_jugador where id_equipos = '{$infogoles['equipo_visitante']}'", PDO::FETCH_ASSOC);
}
$mensaje = [];
$id = [];
if (empty($_POST['id_jugador_local']) && empty($_POST['id_jugador_visita'])&& empty($_POST['id_jugador_local_ama'])&& empty($_POST['id_jugador_visita_ama'])&& empty($_POST['id_jugador_local_ama2'])&& empty($_POST['id_jugador_visita_ama2'])&& empty($_POST['id_jugador_local_roj'])&& empty($_POST['id_jugador_local_roj'])&& empty($_POST['id_jugador_visita_roj'])&& empty($_POST['id_jugador_local_roj2'])&& empty($_POST['id_jugador_visita_roj2'])) {
    $mensaje[] = "Debe de seleccionar El Jugador";
}
if (!empty($_POST) && $_POST['id_jugador_local']) {
    $id_jugador = $_POST['id_jugador_local'];
    if (empty($mensaje)) {
        $goles = $pdo->exec("INSERT INTO goles (id_partido_jugados_fk, id_jugadores_fk, id_equipos_fk) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_local"]}')");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_visita']) {
    $id_jugador = $_POST['id_jugador_visita'];
    if (empty($mensaje)) {
        $goles = $pdo->exec("INSERT INTO goles (id_partido_jugados_fk, id_jugadores_fk, id_equipos_fk) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_visitante"]}')");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_local_ama']) {
    $id_jugador = $_POST['id_jugador_local_ama'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_local"]}',2)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_visita_ama']) {
    $id_jugador = $_POST['id_jugador_visita_ama'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_visitante"]}',2)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_local_ama2']) {
    $id_jugador = $_POST['id_jugador_local_ama2'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_local"]}',2)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_visita_ama2']) {
    $id_jugador = $_POST['id_jugador_visita_ama2'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_visitante"]}',2)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_local_roj']) {
    $id_jugador = $_POST['id_jugador_local_roj'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_local"]}',1)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_visita_roj']) {
    $id_jugador = $_POST['id_jugador_visita_roj'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_visitante"]}',1)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_local_roj2']) {
    $id_jugador = $_POST['id_jugador_local_roj2'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_local"]}',1)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
if (!empty($_POST) && $_POST['id_jugador_visita_roj2']) {
    $id_jugador = $_POST['id_jugador_visita_roj2'];
    if (empty($mensaje)) {
        $amarilla = $pdo->exec("INSERT INTO golazo.amonestaciones (id_partidos_jug, id_jugadore_fk, id_equipos_fk,id_amonestaciones) VALUES ('{$info_partido_jugado}', '{$id_jugador}', '{$info[0]["equipo_visitante"]}',1)");
        $mensaje[] = "Se registro exitosamente";
        header("Location: partido_jugado.php?codigo=$idfixture?");
    } else {
        $mensaje[] = "El Hubo problemas en la conexion";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Partido-Jugado</title>
</head>
<body>
<header class="encabezado">
    <img src="../img/golazo.png" alt="" class="logo" onclick=" location = '../inicio.php'">
    <input type="submit" value="Cerrar Sesión" onclick=" location = 'NuevaCiudad.php'" class="cerrar">
</header>
<section class="workspace">
    <nav class="navbar">
        <ul id="barra">
            <li><a href="../inicio.php"> Inicio</a></li>
            <li><a href="#"> Creación de </a>
                <ul>
                    <li><a href="arbitro.php">Árbitros</a></li>
                    <li><a href="entrenador.php"> Entrenador </a></li>
                    <li><a href="usuarios.php">Usuarios </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Tablas</a>
                <ul>
                    <li><a href="tabla_posiciones.php">Tabla de Posiciones</a></li>
                    <li><a href="tabla_goleadores.php">Tabla de Goleadores</a></li>

                </ul>
            </li>
            <li><a href="resultados.php"> Resultados </a></li>


        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Partido en Juego</h1>
            <input type="submit" value="Jugar" onclick="location='jugar.php?cod=<?php echo $idfixture?>'">
        </div>

        <div class="equipos">
            <table border="1" style="margin: -3% auto auto -10%;">
                <thead>
                <tr>
                    <th>Equipo Local</th>
                    <th>VS</th>
                    <th>Equipo Visitante</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($info as $inf): ?>
                    <tr>
                        <td style="text-align: center;font-size: 25px"><?php echo $inf['nombre_equipo_local']?></td>
                        <td style="text-align: center;font-size: 25px"><?php echo 'VS'?></td>
                        <td style="text-align: center;font-size: 25px"><?php echo $inf['nombre_equipo_visita']?></td>
                    </tr>
                <?php endforeach;?>
                <?php foreach ($resultados as $results):?>
                <tr>

                    <td style="font-size: 100px"><?php echo $results['goles_local']?></td>
                    <td><div style="font-size: 50px; height: 150px"><h1 style="height: 20px;  line-height: 50px;">-</h1></div></td>
                    <td style="font-size: 100px"><?php echo $results['goles_visitante']?></td>
                    <?php endforeach;?>
                </tr>
                <tr style="height: auto">

                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_local" id="id_jugador_local">
                                <option value="0"></option>
                                <?php foreach ($ingreso_goles as $ing):?>
                                    <option value="<?php echo $ing['id_jugador']?>"><?php echo $ing['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>

                            <input style="height: 100px;width: 100px;margin: 0px" type="submit" value="GOL!">

                        </form>
                    </td>
                    <td></td>
                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_visita" id="id_jugador_visita">
                                <option value="0"></option>
                                <?php foreach ($ingreso_goles2 as $ing):?>
                                    <option value="<?php echo $ing['id_jugador']?>"><?php echo $ing['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>

                            <input style="height: 100px;width: 100px;margin: 0px" type="submit" value="GOL!">

                        </form>
                    </td>
                    <td>

                    </td>

                </tr>
                <tr style="height: auto">

                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_local_ama" id="id_jugador_local_ama">
                                <option value="0"></option>
                                <?php foreach ($amarillas as $ama):?>
                                    <option value="<?php echo $ama['id_jugador']?>"><?php echo $ama['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>

                            <input style="height: 100px;width: 100px;margin: 0px;background-color: #ffdb23;color: black" type="submit" value="Amarilla" class="amarilla">

                        </form>
                    </td>
                    <td></td>
                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_visita_ama2" id="id_jugador_visita_ama2">
                                <option value="0"></option>
                                <?php foreach ($amarillas2 as $ama):?>
                                    <option value="<?php echo $ama['id_jugador']?>"><?php echo $ama['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>

                            <input style="height: 100px;width: 100px;margin: 0px;background-color: #ffdb23;color: black" type="submit" value="Amarilla" class="amarilla">

                        </form>
                    </td>
                    <td>

                    </td>

                </tr>
                <tr style="height: auto">

                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_local_roj" id="id_jugador_local_roj">
                                <option value="0"></option>
                                <?php foreach ($rojas as $roj):?>
                                    <option value="<?php echo $roj['id_jugador']?>"><?php echo $roj['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>

                            <input style="height: 100px;width: 100px;margin: 0px;background-color: #c32005" type="submit" value="Roja" class="roja">

                        </form>
                    </td>
                    <td></td>
                    <td>
                        <form action="" method="post">
                            <select name="id_jugador_visita_roj2" id="id_jugador_visita_roj2">
                                <option value="0"></option>
                                <?php foreach ($rojas2 as $roj):?>
                                    <option value="<?php echo $roj['id_jugador']?>"><?php echo $roj['nomb_jugador']?></option>
                                <?php endforeach; ?>
                            </select>
                            <input style="height: 100px;width: 100px;margin: 0px;background-color: #c32005" type="submit" value="Roja" class="roja">

                        </form>
                    </td>
                    <td>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>
        <br>






    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>