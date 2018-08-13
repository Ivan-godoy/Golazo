<?php
require_once '../conexion.php';
$arbitros = $pdo->query("Select *  from arbitro", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Arbitros</title>
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
            <li><a href="#"> Creación de  </a>
                <ul>
                    <li><a href="arbitro.php">Árbitros</a></li>
                    <li><a href="entrenador.php"> Entrenador </a></li>
                    <li><a href="usuarios.php">Usuarios </a></li>

                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestipon de Temporada </a></li>
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
            <h1>Tabla de Árbitros</h1>
            <input type="submit" value="Nuevo Arbitro" onclick=" location = 'NuevoArbitro.php'">
        </div>
        <div class="equipos" style="margin-left: 10%">
            <!----- La infotmacion ----->
            <?php foreach ($arbitros as $arbitro): ?>
                <div class="contequipo" style="font-size: 70%; width: 300px; display: flex; margin: 10px;">
                    <img src="<?php echo "img_arbitros/".$arbitro['foto_arbitro']?>" alt="" style="width: 35%; height: 100px; background-color: #142450">
                    <div style="margin: 0;text-align: left"><?php echo"Nombre: ". $arbitro['nom_arbitro'] . "<br>" ."Arbitro". "<br>". "POSICION"?></div>
                    <input style="margin-left: 10%" type="submit" value="Eliminar" onclick="location='detalle_arbitro.php?codigo=<?php echo $arbitro['id_arbitro']?> &operacion=eliminar'">
                </div>

            <?php endforeach;?>
        </div>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>
