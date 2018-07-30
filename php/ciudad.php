<?php
require_once '../conexion.php';
$ciudades = $pdo->query("Select * "
    ." from ciudad", PDO::FETCH_ASSOC);
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
    <img src="../img/golazo.png" alt="" class="logo">
</header>
<section class="workspace">
    <nav class="navbar">
        <ul id="barra">
            <li><a href="../inicio.php"> Inicio</a></li>
            <li><a href="#"> Gestiones </a>
                <ul>
                    <li><a href="arbitro.php"> Árbitros</a></li>
                    <li><a href="#"> sub 2 </a></li>
                    <li><a href="#"> sub 3 </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="#"> Item de Navegación 4 </a></li>
            <li><a href="#"> Item de Navegación 5 </a></li>
            <li><a href="#"> Item de Navegación 6 </a></li>
            <li><a href="#"> Item de Navegación 7 </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Tabla de Ciudades</h1>
            <input type="submit" value="Nueva Ciudad" onclick=" location = 'NuevaCiudad.php'">
        </div>
        <table border="1">
            <thead>
            <tr>
                <th>Codigo de la Ciudad</th>
                <th>Nombre de la Ciudad</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <!----- La infotmacion ----->
            <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?php echo $ciudad['idciudad']?></td>
                    <td><?php echo $ciudad['nom_cuidad']?></td>
                    <td><input type="submit" value="Eliminar" onclick=" location = 'detalle.php?codigo=<?php echo $ciudad['idciudad']?> &operacion=eliminar'");?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </section>

</section>
<footer class="pie">
    <p>Copyright&copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>