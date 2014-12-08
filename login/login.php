<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once ("../cabecera.php");
?>
    <ul class="nav">
        <li class="active"><a href="<?php ruta_raiz();?>/index.php">Inicio</a></li>
    </ul>
<?php 
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
    function Ingreso(){
?>
    <div class="container">
        <div class="row">
            <div class="span6">
                <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> LOGUEATE </legend>
                <div class="account-wall">
                    <img class="profile-img" src="http://banot.etsii.ull.es/alu4147/STW/objetivo.jpg" alt="Objetivo">
                    </br>
                    </br>
                    </br>
                    <form action="login.php" method="post" class="form-signin">
                        <input type="text" name="usuario" size="30" maxlength="20" />
                        </br>
                        <input type="password" name="password" size="40" maxlength="10" />
                        </br>
                        </br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Logueate</button>
                    </form>
                </div>
                <a href="<?php ruta_raiz();?>/login/registro.php" class="text-center new-account">Crear cuenta </a>
            </div>
        </div>
    </div>
<?php
    }
    if (isset($_POST["usuario"])){ 
        if(trim($_POST["usuario"]) != '' && trim($_POST["password"]) != ''){
            $usuario = $_POST["usuario"]; 
            $password = $_POST["password"];
            $sql = seleccionarpassword($usuario);
            $row = mysqli_fetch_array($sql);
            if($row["nombre"] == $usuario){ //si existe el usuario en la bbdd
                if($row["password"] == $password) { //si la contraseña coincide con la almacenada
                    session_start();
                    $_SESSION["k_username"] = isset($row["nombre"]) ? $row["nombre"] :null;
                    echo 'Has sido logueado correctamente '.$_SESSION["k_username"].' <p>';
                    ?>
                    <SCRIPT LANGUAGE="javascript"> location.href = "<?php ruta_raiz();?>/index.php" </SCRIPT>
                    <?php
                }
                else{
                    echo 'Password incorrecto';
                    Ingreso();
                }
            }
            else{
                echo 'Usuario no existente en la base de datos';
                Ingreso();
            }
        }
        else{
            echo 'Debe especificar un usuario y password';
            Ingreso();
        }
    }
    else{ 
        Ingreso();
    }
  
    require_once ("../pie.php");
    
?>
