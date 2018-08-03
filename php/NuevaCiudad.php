<?php
require_once '../conexion.php';
$mensaje=[];
if(!empty($_POST)){//Procesar el formulario
    $nombre = $_POST['nom_ciudad'];
    if (empty($nombre)){
        $mensaje[] = "Todos los campos son Obligatorios!";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO ciudad (nom_ciudad) VALUES ('{$nombre}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "La Ciudad Fue Creada";
        }else{
            $mensaje[]= "La Ciudad no fue Creada";
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
                    <li><a href="jugador.php"> Jugador </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="#"> Item de Navegación 4 </a></li>
            <li><a href="#"> Item de Navegación 5 </a></li>
            <li><a href="#"> Item de Navegación 6 </a></li>
            <li><a href="temporada.php"> Temporada </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Creacion de Ciudad</h1>
            <input type="submit" value="Volver" onclick=" location = 'ciudad.php'">
        </div>
        <form action="" method="post" id="formulario">
            <div class="seccion">
                <label for="nom_ciudad">Nombre de la Ciudad</label>
                <input type="text" name="nom_ciudad" id="nom_ciudad">
            </div>
            <br>
            <div class="botones">
                <input type="submit" value="Registrar Ciudad">
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