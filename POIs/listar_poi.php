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
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
    $usuario = $_SESSION["k_username"];
    $result = seleccionartodos($usuario);
    $n_imagen = $_REQUEST["nombre"];
    $long = $_REQUEST["longitud"];
    $lat = $_REQUEST["latitud"];

    $url = 'http://api.geonames.org/findNearbyPOIsOSM?lat='.$lat.'&lng='.$long.'&radius=1&username=free';
    $xml = simplexml_load_file($url);
    $count = count($xml); #Numero de POIs

    for ($i = 0; $i < $count; $i++) {
        if ( strlen($xml->poi[$i]->name) > 0 ){
            echo 'Nombre: ' . $xml->poi[$i]->name; ?> <br> <?php
            echo 'Tipo: ' . $xml->poi[$i]->typeName; ?> <br> <?php
            echo 'Latitud: ' . $xml->poi[$i]->lat; ?> <br> <?php
            echo 'Longitud: ' . $xml->poi[$i]->lng; ?> <br> <?php
            echo 'Distancia: ' . $xml->poi[$i]->distance; ?> <br><br><br> <?php
        }
    }
    require_once ("../pie.php");
?>