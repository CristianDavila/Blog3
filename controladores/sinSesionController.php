<?php
    class sinSesionController {

        public static function inicio(){

            $plantilla = new vistasMotor;
            $plantilla->motor("sinSesion", '');

        }
        public static function validar(){
            $usuario= $_POST['usuario'];
            $pass= $_POST['password'];

            $model = new sinSesionModel;
            $valido = $model->validar($usuario, $pass);

            if($valido[0]== "SI"){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['password'] = $pass;
                $_SESSION['valid']= "SI";
                $_SESSION['root']= $valido[1];
            }

            header( 'Location: panel.php' );
            exit();


        }
    }
?>
