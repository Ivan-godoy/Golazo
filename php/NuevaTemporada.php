<?php
require_once '../conexion.php';
$mensaje=[];
if(!empty($_POST)){//Procesar el formulario
    $inicial = $_POST['fecha_inicial'];
    $final = $_POST['fecha_final'];
    if (empty($inicial) && empty($final)){
        $mensaje[] = "Todos los campos son Obligatorios!";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO temporada (fecha_inicio, fecha_final) VALUES ('{$inicial}', '{$final}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "La Temporada Fue Creada";
        }else{
            $mensaje[]= "La Temporada no fue Creada";
        }
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
    <title>Golazo-Creacion-Arbitros</title>
</head>
<body>
<header class="encabezado">
    <img src="../img/golazo.png" alt="" class="logo" onclick=" location = '../inicio.php'">
    <input type="submit" value="Cerrar Sesión" onclick=" location = '../cerrar.php'" class="cerrar">
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
                    <li><a href="#">Tabla de Posiciones</a></li>
                    <li><a href="#">Tabla de Goleadores</a></li>
                </ul>
            </li>
            <li><a href="#"> Resultados </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>
        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Creacion de Temporada</h1>
            <input type="submit" value="Volver" onclick=" location = 'temporada.php'">
        </div>
        <form action="" method="post" id="formulario">
            <div class="seccion">
                <label for="fecha_inicial">Fecha Inicial</label>
                <input type="date" name="fecha_inicial" id="fecha_inicial">
            </div>
            <div class="seccion">
                <label for="fecha_final">Fecha Final</label>
                <input type="date" name="fecha_final" id="fecha_final">
            </div>
            <br>
            <div class="botones">
                <input type="submit" value="Registrar Temporada">
                <input type="reset" value="Limpiar">
            </div>
            <?php
            if (!empty($mensaje)):
                echo '<ul>';
                foreach ($mensaje as $msj){
                    echo "<li>{$msj}</li>";
                }
                echo '</ul>';
            endif;
            ?>
        </form>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>