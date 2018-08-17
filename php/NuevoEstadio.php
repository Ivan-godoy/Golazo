<?php
require_once '../conexion.php';
$mensaje=[];
$ciudades = $pdo->query("Select * from ciudad", PDO::FETCH_ASSOC);
if(!empty($_POST)){//Procesar el formulario
    $nom_estadios = $_POST['nom_estadios'];
    $capacidad = $_POST['capacidad'];
    $id_ciudad = $_POST['ciudades'];
    if (empty($nom_estadios) || empty($capacidad) || empty($id_ciudad)){
        $mensaje[] = "Todos los campos son Obligatorios!";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO estadios (nom_estadios, capacidad, id_ciudad) VALUES ('{$nom_estadios}', '{$capacidad}', '{$id_ciudad}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "El Estadio Fue Creado";
        }else{
            $mensaje[]= "El Estadio no fue Creado";
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
    <title>Golazo-Nuevo_Estadio</title>
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
            <li><a href="estadio.php"> Gestión de Estadio </a></li>
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
            <h1>Creacion de Estadios</h1>
            <input type="submit" value="Volver" onclick=" location = 'estadio.php'">
        </div>
        <form action="" method="post" id="formulario">
            <table style="width: auto;">
                <tr style="height: 50px">
                    <td><label for="nom_estadios">Nombre del Estadio</label></td>
                    <td><input type="text" name="nom_estadios" id="nom_estadios"></td>
                </tr>
                <tr style="height: 50px">
                    <td style="justify-content: flex-end"><label for="capacidad">Capacidad Maxima</label></td>
                    <td><input type="number" min="1" max="150000" name="capacidad" id="capacidad" style="width: 300px; height: 30px"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="ciudades"> Estadio de Equipo</label></td>
                    <td><select name="ciudades" id="ciudades">
                            <?php foreach ($ciudades as $ciudad):?>
                                <option value="<?php echo $ciudad['id_ciudad']?>"><?php echo $ciudad['nom_ciudad']?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr style="height: 50px">
                    <td colspan="2">
                        <input type="submit" value="Registrar Estadio">
                        <input type="reset" value="Limpiar">
                    </td>
                </tr>
            </table>

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