<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if ($_SESSION['k_username'] == null) {
?>
        <ul class="navbar-text pull-right">
            <a href="<?php ruta_raiz();?>/login/registro.php" class="navbar-link">Registrarse</a>
            <a href="<?php ruta_raiz();?>/login/login.php" class="navbar-link">Logearse</a>
        </ul>
<?php
    } else {
?>
        <ul class="navbar-text pull-right">
            <a href="<?php ruta_raiz();?>/login/logout.php" class="navbar-link">Desconectarse</a> 
        </ul>
<?php
    }
?>
<!-- A CONTINUACIÓN CERRAMOS TODAS LAS SECCIONES ABIERTAS EN CABECERA.PHP -->
          </div><!--/.nav-collapse -->
        </div>
      </div> 

