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
    function Registro(){
        ?>
            <div class="container">
                <div class="row clearfix">
                    <div class="span12">
                        <div class="row clearfix">
                            <div class="span6">
                                <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> REGISTRATE</legend>
                                <form action="registro.php" method="post" class="form" role="form">
                                    <h4>Nombre:</h4> <input type="text" name="username" size="30" maxlength="20" />
                                    <br/>
                                    <h4>Contraseña:</h4> <input type="password" name="password" size="40" maxlength="10" />
                                    <br/>
                                    <h4>Confirmar Contraseña:</h4> <input type="password" name="password2" size="40" maxlength="10" />
                                    <br/>
                                    <br/>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    if (isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if($username==NULL | $password==NULL | $password2==NULL){ //si hay campos en blanco...
            echo "Un campo está vacio.";
            Registro(); //MIRAR COMO LLAMAR DE NUEVO AL FORMULARIO DE REGISTRO
        }
        else{
            if($password!=$password2){ //si las contraseñas introducidas no coinciden...
                echo "Las contraseñas no coinciden";
                Registro();
            }
            else{
                $checkuser = seleccionarusuario($username);
                $username_exist = mysqli_num_rows($checkuser);
                if ($username_exist > 0) { //si el usuario existe
                    echo "El nombre de usuario está ya en uso";
                    Registro();
                }
                else{
                    insertarlogin($username, $password);
                    echo 'El usuario '.$username.' ha sido registrado de manera satisfactoria.<br />';
                    ?>
                     <SCRIPT LANGUAGE="javascript"> location.href = "../index.php" </SCRIPT>
                    <?php

                }
            }
        }
    }
    else{
        Registro();
    }

    require_once ("../pie.php");
?>