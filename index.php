<?php
    require_once("cabecera.php");
    error_reporting(E_ALL ^ E_NOTICE);
?>
            <ul class="nav">
              <li class="active"><a href="<?php ruta_raiz();?>/index.php">Inicio</a></li>
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
    require_once ("menuderecha.php");
?>
            
            

    <div class="container">
      <div class="row-clearfix">
        <div class="col-md-12 column">
              <div class="hero-unit">
                <center><h1>GEOLOCALIZACIÓN</h1></center>
                <p> En un entorno móvil como el actual, aprovechar el valor de la ubicación geográfica se ha convertido en una herramienta clave para sacar rendimiento a información que puede ser de vital importancia para las compañías. La tecnología de geolocalización se basa en el sistema de información geográfica GIS para la gestión, análisis y visualización de conocimiento geográfico. </p>
              </div>
        </div>
        <div class="col-md-12 column">
               <h4>DESARROLLADORES:</h4> 
            
			</br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="imagenes/oliver.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">J. Oliver Martínez Novo </h4>
                            <h5>Jefe proyecto & Administrador bases de datos</h5>
                            <hr style="margin:8px auto">
                            <span class="label label-default">HTML5/CSS3</span>
                            <span class="label label-default">PHP</span>
                            <span class="label label-default">Geoname</span>
                            <span class="label label-default">Bootstrap</span>
                            <span class="label label-default">Google</span>
                            <span class="label label-default">JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>
            </br>
			
			
			</br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="imagenes/mohammed.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> Mohammed Mahrach Mahrach </h4>
                            <h5>Desarrollador Web y Gestión de incidencias</h5>
                            <hr style="margin:8px auto">
                            <span class="label label-default">HTML5/CSS3</span>
                            <span class="label label-default">PHP</span>
                            <span class="label label-default">Geoname</span>
                            <span class="label label-default">Bootstrap</span>
                            <span class="label label-default">Google</span>
                            <span class="label label-default">JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>
            </br>
			
			</br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="imagenes/rafa.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> Rafael Abadia Reyes </h4>
                            <h5>Gestión de incidencias y Gestión de Base de Datos</h5>
                            <hr style="margin:8px auto">
                            <span class="label label-default">HTML5/CSS3</span>
                            <span class="label label-default">PHP</span>
                            <span class="label label-default">Geoname</span>
                            <span class="label label-default">Bootstrap</span>
                            <span class="label label-default">Google</span>
                            <span class="label label-default">JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>
            </br>
    
        </div>
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?php
require_once("pie.php");
?>
