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
            <form action='propiedades.php' method='POST' enctype="multipart/form-data">
                <label for="file">Nombre del archivo:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2086667" />
                    <input type="file" name="image" id="file">
                    <input type="submit" name="subir" value="Subir imagen"><br />
            </form>
          </div>
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?php
  require_once("../pie.php");
?>