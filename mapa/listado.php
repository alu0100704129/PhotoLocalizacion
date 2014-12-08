<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../cabecera.php");
?>
            <ul class="nav">
              <li><a href="<?php ruta_raiz();?>/index.php">Inicio</a></li>
              <?php
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
              <li class="active"><a href="<?php ruta_raiz();?>/imagenes/imagenes.php">Imagenes</a></li>
              <?php
                }
              ?>
            </ul>
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
    $usuario = $_SESSION["k_username"];
    $result = seleccionartodos($usuario);
    echo "\n".'<center><table border=2 CELLPADDING=30 WIDTH="40%">'."\n"; 
    echo '<tr><td><b>NOMBRE</b></td><td><b>IMAGEN</b></td><td><b>INFORMACION</b></td><td><b>FOTOS CERCANAS</b></td><td><b>POIs</b></td></tr>'."\n"; 
    while ($row = mysqli_fetch_row($result)){ 
        $nombre = $row[0];
        $foto = $row[1];
        $ancho = $row[2];
        $alto = $row[3];
        $peso = $row[4];
        $camara = $row[5];
        $modelo = $row[6];
        $long = $row[7];
        $lat = $row[8];
        echo '<tr><td>'.$nombre.'</td>'; 
        echo '<td><a href ="mapa.php?nombre='.$nombre.'"><img src="'.$foto.'" HEIGHT="120" WIDTH="120" ></a></td>';
        echo '<td><b>Dimensiones:</b> ' .$ancho?> <br> <?php echo ' X '.$alto?> <br> <?php echo'<b>Tamaño: </b>'. $peso .' Mb'?> <br> <?php echo '<b>Camara: </b> ' .$camara?> <br> <?php echo '<b>Modelo:</b> '.$modelo ?> <br> <?php echo '<b>Longitud:</b> '.$long ?> <br> <?php echo '<b>Latitud:</b> '.$lat ?> <br> <?php echo '</td>';
        echo '<td><form action="../distancia/distancia.php" method="POST"><label for="file"> Introduzca distancia (Kms):</label><input type="text" name="radio" id="radio"><input type="hidden" value="'.$nombre.'" name="nombre" id="nombre"><input type="hidden" value="'.$lat.'" name="latitud" id="latitud"><input type="hidden" value="'.$long.'" name="longitud" id="longitud"><input type="submit" name="enviar" value="Enviar"><br /></form></td>';
        echo '<td><form action="../POIs/listar_poi.php" method="POST"><label for="file"> POIs cercanos a 1 Km:</label><input type="hidden" value="'.$nombre.'" name="nombre" id="nombre"><input type="hidden" value="'.$lat.'" name="latitud" id="latitud"><input type="hidden" value="'.$long.'" name="longitud" id="longitud"><input type="submit" name="enviar" value="Buscar"><br/></form></td></tr>'."\n";
    } 
    echo "</table></center> \n"; 
    require_once ("../pie.php");
?> 
