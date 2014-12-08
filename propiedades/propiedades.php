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
              <li><a href="<?php ruta_raiz();?>/mapa/listado.php">Imagenes</a></li>
              <li class="active"><a href="<?php ruta_raiz();?>/propiedades/fimagen.php">Subir Imagen</a></li>
              <?php 
                }
              ?>
            </ul>
<?php
    error_reporting(E_ALL ^ E_NOTICE);

    require_once ("../menuderecha.php");
    require_once("coordenadas.php");
    require_once("../bbdd/bbdd.php");

    $usuario = $_SESSION["k_username"];
    $nombre_imagen = trim($_FILES["image"]["name"]);
    $img_tmp = $_FILES['image']['tmp_name'];
    $ruta = '../imagenes/'.basename($nombre_imagen);
    $megas = 1048576;
    $imagen_subida = False;

    if (($_FILES["image"]["size"]>2000000) or ( ($_FILES["image"]["error"]) == 2)) {
      echo '<pre>';
      echo "El archivo es mayor que 2MB.";
      print "</pre>";
      $imagen_subida = False;
    }
    else if ( $_FILES["image"]["type"] != 'image/jpeg' ) {
      echo '<pre>';
      echo "Solo soportamos archivos JPG. Disculpe las molestias.";
      print "</pre>";
      $imagen_subida = False;
    }
    else if (move_uploaded_file($img_tmp, $ruta)) {
      move_uploaded_file($img_tmp, $ruta);
      list($ancho, $alto) = getimagesize($ruta);
      $exif = exif_read_data($ruta,'IDF0', true);
      $exif_model = exif_read_data($ruta,'IDF0',false);
      $tipo = $exif['FILE']["MimeType"];
      $modelo = $exif_model['Model'];
      $camara = $exif_model['Make'];
      $lon = getGps($exif['GPS']["GPSLongitude"], $exif['GPS']['GPSLongitudeRef']);
      $lat = getGps($exif['GPS']["GPSLatitude"], $exif['GPS']['GPSLatitudeRef']);
      $peso = round((filesize($ruta)/$megas),2);
      eliminar($nombre_imagen, $usuario);
      insertar($nombre_imagen, $usuario, $ruta, $tipo, $lon, $lat, $ancho, $alto, $peso, $modelo, $camara);
      $imagen_subida = True;
      }
    else{
      echo '<pre>';
      echo "Fallo al leer o informacion corrupta en la informacion de la Imagen.";
      print "</pre>";
      $imagen_subida = False;
    }

    if ( $imagen_subida == False ){
      ?>
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span9">
            <div class="hero-unit">
              <h2>¿Que desea hacer?</h2>
              <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/mapa/listado.php">Listado Imagen</a></p>
              <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/propiedades/fimagen.php">Nueva Imagen</a></p>
            </div>
          </div><!--/span-->
        </div><!--/row-->
      </div><!--/.fluid-container-->
      <?php
    }

    if ( $imagen_subida == True ) {
      ?>
      <div class="container-fluid">
          <div class="row-fluid">
            <div class="span9">
              <div class="hero-unit">
                <h2>Se ha subido la imagen correctamente.</h2>
                <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/mapa/listado.php">Listado Imagen</a></p>
                <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/propiedades/fimagen.php">Nueva Imagen</a></p>
              </div>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/.fluid-container-->
      <?php

    }
?>
        

<?php
  require_once("../pie.php");
?>