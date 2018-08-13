<?php
require_once '../conexion.php';
$mensaje=[];
$estadios = $pdo->query("Select * "
    ." from estadios", PDO::FETCH_ASSOC);
if(!empty($_POST)) {//Procesar el formulario
    $nom_equipo = $_POST['nom_equipo'];
    $fecha_fundacion = $_POST['fecha_fundacion'];
    $esquema = $_POST['esquema'];
    $logo = $_FILES['logo'];
    define('TAM_MAX', 1048576);
    $partes = explode('.', $logo['name']);
    $extension = $partes[count($partes)-1];
    $nombre_generado = time() . '_' .mt_rand(1000, 2000). '.' . $extension;
    if ($logo['error'] === 0){
        $resultado =  move_uploaded_file($logo['tmp_name'], 'img_equipo/'.$nombre_generado);
    }
    $id_estadio = $_POST['estadios'];
    if (empty($nom_equipo_) && empty($fecha_fundacion) && empty($esquema) && empty($id_estadio)){
        $mensaje[] = "Solo puede dejar libre la imagen a Subir!";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO equipo (nom_equipo, fecha_fundacion, esquema_habitual, logo, id_estadio) VALUES ('{$nom_equipo}', '{$fecha_fundacion}', '{$esquema}' ,'{$nombre_generado}', '{$id_estadio}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "El equipo Fue Creado";
        }else{
            $mensaje[]= "El equipo no fue Creado";
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
            <li><a href="equipos.php"> Gestion de Equipos </a></li>
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
            <h1>Creacion de Equipo</h1>
            <input type="submit" value="Volver" onclick=" location = 'equipos.php'">
        </div>
        <form action="" method="post" id="formulario" enctype="multipart/form-data">
            <div class="seccion">
                <label for="nom_equipo">Nombre del Equipo</label>
                <input type="text" name="nom_equipo" id="nom_equipo">
            </div>
            <br>
            <div class="seccion">
                <label for="fecha_fundacion">Fecha de Fundación</label>
                <input type="date" name="fecha_fundacion" id="fecha_fundacion">
            </div>
            <br>
            <div class="seccion">
                <label for="esquema">Esquema Habitual</label>
                <input type="text" name="esquema" id="esquema" placeholder="0-0-0">
            </div>
            <br>
            <div class="seccion">
                <label for="logo"> Logo del Equipo</label>
                <input type="file" name="logo" id="logo" accept="image/*" value="">
            </div>
            <br>
            <div class="seccion">
                <label for="estadios"> Estadio de Equipo</label>
                <select name="estadios" id="estadios">
                    <?php foreach ($estadios as $estadio):?>
                        <option value="<?php echo $estadio['id_estadios']?>"><?php echo $estadio['nom_estadios']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <div class="botones">
                <input type="submit" value="Registrar Equipo">
                <input type="reset" value="Limpiar">
            </div>
            <br>
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