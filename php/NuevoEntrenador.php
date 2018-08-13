<?php
require_once '../conexion.php';

$mensaje=[];
$id=[];
$equipo = $pdo->query("Select * from equipo", PDO::FETCH_ASSOC);
if(!empty($_POST)) {//Procesar el formulario
    $nom_entrenador = $_POST['nom_entrenador'];
    $nacionalidad_entrenador = $_POST['nacionalidad_entrenador'];
    $lugar_nacimiento_entrenador = $_POST['lugar_nacimiento_entrenador'];
    $fecha_nacimiento_entrenador = $_POST['fecha_nacimiento_entrenador'];
    $foto_entrenador = $_FILES['foto_entrenador'];
    define('TAM_MAX', 1048576);
    $partes = explode('.', $foto_entrenador['name']);
    $extension = $partes[count($partes)-1];
    $nombre_generado = time() . '_' .mt_rand(1000, 2000). '.' . $extension;
    if ($foto_entrenador['error'] === 0){
        $resultado =  move_uploaded_file($foto_entrenador['tmp_name'], 'img_entrenador/'.$nombre_generado);
    }
    $id_equipo = $_POST['id_equipo'];
    if(empty($nom_entrenador) || empty($nacionalidad_entrenador) || empty($lugar_nacimiento_entrenador) || empty($fecha_nacimiento_entrenador)  || empty($id_equipo)){
        $mensaje[] = "verifique que todos los campos esten llenos";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO entrenador (nom_entrenador, nacionalidad_entrenador, lugar_nacimiento_entrenador, fecha_nacimiento_entrenador, foto_entrenador, id_equipo) VALUES ('{$nom_entrenador}', '{$nacionalidad_entrenador}', '{$lugar_nacimiento_entrenador}','{$fecha_nacimiento_entrenador}', '{$nombre_generado}', '{$id_equipo}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "El Entrenador Fue Creado";

        }else{
            $mensaje[]= "El Entrenador no fue Creado";
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
    <title>Golazo-Creacion-Entrenador</title>
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
            <li><a href="equipos.php"> Gestion de Equipos </a></li>
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="temporada.php"> Gestion de Temporada </a></li>
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
            <h1>Creacion de Entrenador</h1>
            <input type="submit" value="Volver" onclick=" location = 'entrenador.php'">
        </div>
        <form action="" method="post" id="formulario" enctype="multipart/form-data">
            <table style="border: black solid 1px; margin-top: -80px; width: 60%">
                <tr style="height: 50px">
                    <td><label for="nom_entrenador" style="margin: 0; padding: 0;">Nombre Completo del Entrenador</label></td>
                    <td><input type="text" name="nom_entrenador" id="nom_entrenador" style="margin: 0; padding: 0;"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="nacionalidad_entrenador" style="margin: 0; padding: 0;">Nacionalidad del Entrenador</label></td>
                    <td><select name="nacionalidad_entrenador" id="nacionalidad_entrenador">
                            <option value="NAMIBIANA">NAMIBIANA</option>
                            <option value="ANGOLESA">ANGOLESA</option>
                            <option value="ARGELIANA">ARGELIANA</option>
                            <option value="DE BENNIN">DE BENNIN</option>
                            <option value="BOTSWANESA">BOTSWANESA</option>
                            <option value="BURUNDESA">BURUNDESA</option>
                            <option value="DE CABO VERDE">DE CABO VERDE</option>
                            <option value="COMORENSE">COMORENSE</option>
                            <option value="CONGOLESA">CONGOLESA</option>
                            <option value="MARFILEÑA">MARFILEÑA</option>
                            <option value="CHADIANA">CHADIANA</option>
                            <option value="DE DJIBOUTI">DE DJIBOUTI</option>
                            <option value="EGIPCIA">EGIPCIA</option>
                            <option value="ETIOPE">ETIOPE</option>
                            <option value="GABONESA">GABONESA</option>
                            <option value="GAMBIANA">GAMBIANA</option>
                            <option value="GHANATA">GHANATA</option>
                            <option value="GUINEA">GUINEA</option>
                            <option value="GUINEA">GUINEA</option>
                            <option value="GUINEA ECUATORIANA">GUINEA ECUATORIANA</option>
                            <option value="LIBIA">LIBIA</option>
                            <option value="KENIANA">KENIANA</option>
                            <option value="LESOTHENSE">LESOTHENSE</option>
                            <option value="LIBERIANA">LIBERIANA</option>
                            <option value="MALAWIANA">MALAWIANA</option>
                            <option value="MALIENSE">MALIENSE</option>
                            <option value="MARROQUI">MARROQUI</option>
                            <option value="MAURICIANA">MAURICIANA</option>
                            <option value="MAURITANA">MAURITANA</option>
                            <option value="MOZAMBIQUEÑA">MOZAMBIQUEÑA</option>
                            <option value="NIGERINA">NIGERINA</option>
                            <option value="NIGERIANA">NIGERIANA</option>
                            <option value="CENTRO AFRICANA">CENTRO AFRICANA</option>
                            <option value="CAMERUNESA">CAMERUNESA</option>
                            <option value="TANZANIANA">TANZANIANA</option>
                            <option value="RWANDESA">RWANDESA</option>
                            <option value="DEL SAHARA">DEL SAHARA</option>
                            <option value="DE SANTO TOM">DE SANTO TOM</option>
                            <option value="SENEGALESA">SENEGALESA</option>
                            <option value="DE SEYCHELLES">DE SEYCHELLES</option>
                            <option value="SIERRA LEONESA">SIERRA LEONESA</option>
                            <option value="SOMALI">SOMALI</option>
                            <option value="SUDAFRICANA1">SUDAFRICANA</option>
                            <option value="SUDANESA">SUDANESA</option>
                            <option value="SWAZI">SWAZI</option>
                            <option value="TOGOLESA">TOGOLESA</option>
                            <option value="TUNECINA">TUNECINA</option>
                            <option value="UGANDESA">UGANDESA</option>
                            <option value="ZAIRANA">ZAIRANA</option>
                            <option value="ZAMBIANA">ZAMBIANA</option>
                            <option value="DE ZIMBAWI">DE ZIMBAWI</option>
                            <option value="ARGENTINA">ARGENTINA</option>
                            <option value="BAHAMEÑA ">BAHAMEÑA</option>
                            <option value="DE BARBADOS">DE BARBADOS</option>
                            <option value="BELICEÑA">BELICEÑA</option>
                            <option value="BOLIVIANA">BOLIVIANA</option>
                            <option value="BRASILEÑA">BRASILEÑA</option>
                            <option value="CANADIENSE">CANADIENSE</option>
                            <option value="COLOMBIANA">COLOMBIANA</option>
                            <option value="COSTARRICENSE">COSTARRICENSE</option>
                            <option value="CUBANA">CUBANA</option>
                            <option value="CHILENA">CHILENA</option>
                            <option value="DOMINICA">DOMINICA</option>
                            <option value="SALVADOREÑA">SALVADOREÑA</option>
                            <option value="ESTADOUNIDENSE">ESTADOUNIDENSE</option>
                            <option value="GRANADINA">GRANADINA</option>
                            <option value="GUATEMALTECA">GUATEMALTECA</option>
                            <option value="BRITANICA">BRITANICA</option>
                            <option value="GUYANESA">GUYANESA</option>
                            <option value="HAITIANA">HAITIANA</option>
                            <option value="HONDUREÑA">HONDUREÑA</option>
                            <option value="JAMAIQUINA">JAMAIQUINA</option>
                            <option value="MEXICANA">MEXICANA</option>
                            <option value="NICARAGUENSE">NICARAGUENSE</option>
                            <option value="PANAMEÑA">PANAMEÑA</option>
                            <option value="PARAGUAYA">PARAGUAYA</option>
                            <option value="PERUANA">PERUANA</option>
                            <option value="PUERTORRIQUEÑA">PUERTORRIQUEÑA</option>
                            <option value="DOMINICANA">DOMINICANA</option>
                            <option value="SANTA LUCIENSE">SANTA LUCIENSE</option>
                            <option value="SURINAMENSE">SURINAMENSE</option>
                            <option value="TRINITARIA">TRINITARIA</option>
                            <option value="URUGUAYA">URUGUAYA</option>
                            <option value="VENEZOLANA">VENEZOLANA</option>
                            <option value="AMERICANA">AMERICANA</option>
                            <option value="AFGANA">AFGANA</option>
                            <option value="DE BAHREIN">DE BAHREIN</option>
                            <option value="BHUTANESA">BHUTANESA</option>
                            <option value="BIRMANA">BIRMANA</option>
                            <option value="NORCOREANA">NORCOREANA</option>
                            <option value="SUDCOREANA">SUDCOREANA</option>
                            <option value="CHINA">CHINA</option>
                            <option value="CHIPRIOTA">CHIPRIOTA</option>
                            <option value="ARABE">ARABE</option>
                            <option value="FILIPINA">FILIPINA</option>
                            <option value="HINDU">HINDU</option>
                            <option value="INDONESA">INDONESA</option>
                            <option value="IRAQUI">IRAQUI</option>
                            <option value="IRANI">IRANI</option>
                            <option value="ISRAELI">ISRAELI</option>
                            <option value="JAPONESA">JAPONESA</option>
                            <option value="JORDANA">JORDANA</option>
                            <option value="CAMBOYANAKUWAITI">CAMBOYANA</option>
                            <option value="LIBANESA">KUWAITI</option>
                            <option value="MALASIA">LIBANESA</option>
                            <option value="MALDIVA">MALASIA</option>
                            <option value="MONGOLESA">MALDIVA</option>
                            <option value="NEPALESA">MONGOLESA</option>
                            <option value="OMANESA">NEPALESA</option>
                            <option value="PAKISTANI">OMANESA</option>
                            <option value="DEL QATAR">PAKISTANI</option>
                            <option value="SIRIA">DEL QATAR</option>
                            <option value="LAOSIANA">SIRIA</option>
                            <option value="SINGAPORENSE">LAOSIANA</option>
                            <option value="TAILANDESA">SINGAPORENSE</option>
                            <option value="TAIWANESA">TAILANDESA</option>
                            <option value="TURCA">TAIWANESA</option>
                            <option value="NORVIETNAMITA">TURCA</option>
                            <option value="YEMENI">NORVIETNAMITA</option>
                            <option value="ALBANESA">YEMENI</option>
                            <option value="ALEMANA">ALBANESA</option>
                            <option value="">ALEMANA</option>
                            <option value="ANDORRANA">ANDORRANA</option>
                            <option value="AUSTRIACA">AUSTRIACA</option>
                            <option value="BELGA">BELGA</option>
                            <option value="BULGARA">BULGARA</option>
                            <option value="CHECOSLOVACA">CHECOSLOVACA</option>
                            <option value="DANESA">DANESA</option>
                            <option value="VATICANA">VATICANA</option>
                            <option value="ESPAÑOLA">ESPAÑOLA</option>
                            <option value="FINLANDESA">FINLANDESA</option>
                            <option value="FRANCESA">FRANCESA</option>
                            <option value="GRIEGA">GRIEGA</option>
                            <option value="HUNGARA">HUNGARA</option>
                            <option value="IRLANDESA">IRLANDESA</option>
                            <option value="ISLANDESA">ISLANDESA</option>
                            <option value="ITALIANA">ITALIANA</option>
                            <option value="LIECHTENSTENSE">LIECHTENSTENSE</option>
                            <option value="LUXEMBURGUESA">LUXEMBURGUESA</option>
                            <option value="MALTESA">MALTESA</option>
                            <option value="MONEGASCA">MONEGASCA</option>
                            <option value="NORUEGA">NORUEGA</option>
                            <option value="HOLANDESA">HOLANDESA</option>
                            <option value="PORTUGUESA">PORTUGUESA</option>
                            <option value="BRITANICA">BRITANICA</option>
                            <option value="SOVIETICA BIELORRUSA">SOVIETICA BIELORRUSA</option>
                            <option value="SOVIETICA UCRANIANA">SOVIETICA UCRANIANA</option>
                            <option value="RUMANA">RUMANA</option>
                            <option value="SAN MARINENSE">SAN MARINENSE</option>
                            <option value="SUECA">SUECA</option>
                            <option value="SUIZA">SUIZA</option>
                            <option value="YUGOSLAVA">YUGOSLAVA</option>
                            <option value="AUSTRALIANA">AUSTRALIANA</option>
                            <option value="FIJIANA">FIJIANA</option>
                            <option value="SALOMONESA">SALOMONESA</option>
                            <option value="NAURUANA">NAURUANA</option>
                            <option value="PAPUENSE">PAPUENSE</option>
                            <option value="SAMOANA">SAMOANA</option>
                            <option value="ESLOVACA">ESLOVACA</option>
                            <option value="BURKINA FASO">BURKINA FASO</option>
                            <option value="ESTONIA">ESTONIA</option>
                            <option value="MICRONECIA">MICRONECIA</option>
                            <option value="REINO UNIDO(DEPEN. TET. BRIT.)">REINO UNIDO(DEPEN. TET. BRIT.)</option>
                            <option value="REINO UNIDO(BRIT. DEL EXT.)">REINO UNIDO(BRIT. DEL EXT.)</option>
                            <option value="REINO UNIDO(C. BRIT. DEL EXT.)">REINO UNIDO(C. BRIT. DEL EXT.)</option>
                            <option value="REINO">REINO UNIDO</option>
                            <option value="UNIDO">KIRGUISTAN</option>
                            <option value="KIRGUISTAN">LITUANIA</option>
                            <option value="LITUANIA">MOLDOVIA, REPUBLICA DE</option>
                            <option value="MOLDOVIA,">MACEDONIA</option>
                            <option value="REPUBLICA">ESLOVENIA</option>
                            <option value="ESLOVAQUIA">ESLOVAQUIA</option>
                        </select></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="lugar_nacimiento_entrenador" style="margin: 0; padding: 0;">Lugar de nacimiento del Entrenador</label></td>
                    <td><input type="text" name="lugar_nacimiento_entrenador" id="lugar_nacimiento_entrenador"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="fecha_nacimineto_entrenador" style="margin: 0; padding: 0; ">Fecha de Nacimiento</label></td>
                    <td><input type="date" name="fecha_nacimiento_entrenador" id="fecha_nacimineto_entrenador"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="foto_entrenador" style="margin: 0; padding: 0; "> Foto del Entrenador</label></td>
                    <td><input type="file" name="foto_entrenador" id="foto_entrenador" accept="image/*" value=""></td>
                </tr>
                <br>
                <tr style="height: 50px">
                    <td><label for="id_equipo" style="margin: 0; padding: 0; "> Equipo que Entrenara</label></td>
                    <td><select name="id_equipo" id="id_equipo">
                            <?php foreach ($equipo as $equi):?>
                                <option value="<?php echo $equi['id_equipo']?>"><?php echo $equi['nom_equipo']?></option>
                            <?php endforeach; ?>
                        </select></td>
                </tr>
                <tr style="height: 50px">
                    <td colspan="2">
                        <input type="submit" value="Registrar Entrenador">
                        <input type="reset" value="Limpiar"></td>
                </tr>
            </table>
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