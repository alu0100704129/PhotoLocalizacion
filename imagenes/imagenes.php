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
              <li><a href="<?php ruta_raiz();?>/imagenes/imagenes.php">Imagenes</a></li>
              <?php
                }
              ?>
            </ul>
<?php    
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
?>
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
        
          <div class="hero-unit">
              <h2>Suba sus imágenes</h2>
                <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/propiedades/fimagen.php">Pulse aquí</a></p>
          </div>
            
          <div class="hero-unit">
              <h2>Listado de sus imágenes</h2>
                <p><a class="btn btn-primary btn-large" href="<?php ruta_raiz();?>/mapa/listado.php">Pulse aquí</a></p>
          </div>
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?php
  require_once("../pie.php");
?>