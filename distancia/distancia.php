<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../cabecera.php");
?>
<ul class="nav">
    <li><a href="<?php ruta_raiz();?>/index.php">Home</a></li>
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
    $radio = $_REQUEST["radio"];
    $n_imagen = $_REQUEST["nombre"];
    $long = $_REQUEST["longitud"];
    $lat = $_REQUEST["latitud"];
?>
<div class="col-md-12">
    <div class="row-fluid">
        <div class="span9 offset2">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Fotografía
                        </th>
                        <th>
                            Distancia
                        </th>
                    </tr>
                </thead>  
                <tbody>           
            
<?php
    while ($lista = mysqli_fetch_row($result)){
        if ( $n_imagen != $lista[0] ){
            $x = ($lista[7] - $long);
            $y = ($lista[8] - $lat);
            $x = pow($x, 2);
            $y = pow($y, 2);
            $aux1 = sqrt($x + $y);
            $dist = ( $aux1 * 111.12);
            if ( $radio >= $dist ){
                echo '<tr><td><th><img src="'.$lista[1] . '" HEIGHT="120" WIDTH="120" >'. round($dist,2) ." Kms".'</td></tr>';
            }
        }
    }
?>
   
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php


    require_once ("../pie.php");
?>

