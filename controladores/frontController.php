<?php

    class frontController{

/////////////////////////////////////////////////////////////////////////////////////////////////
//Esta funcion se encarga de cargar los controladores y los modelos necesarios aprovechando que//
//los controladores y los modelos contienen el mismo nombre, diferenciandose solo por 'Model' y//
//'Controller'  , tambien carga otras clases y configuraciones necesarias                      //
/////////////////////////////////////////////////////////////////////////////////////////////////
        private static function autoloader($name){

            //Cargamos las configuraciones (primero la clase y luego las configuraciones
            include('./config/configClass.php');
            include('./config/config.php');

            //Cargamos los nucleos
            include('./core/coreView.php');
            include('./core/coreController.php');
            include('./core/coreModel.php');            


            include('./vistas/vistasMotor.php');
            //Necesita volver hacia atras porque a la hora de llamar al modelo nos encontramos en '/controladores'



            $modelo = './modelos/' . $name . 'Model.php';
            if(is_file($modelo)) include($modelo);
            //Necesita volver hacia atras porque a la hora de llamar al modelo nos encontramos en '/controladores'

            $controlador = 'controladores/' . $name . 'Controller.php';
            if(is_file($controlador)) include($controlador);



        }


/////////////////////////////////////////////////////////////////////////////////////////////////
//Esta funcion se encarga de resolver el controlador y la accion solicitada, instanciar el     //
//objeto necesario y ejecutar el metodo requerido en index.php                                 //
/////////////////////////////////////////////////////////////////////////////////////////////////
        public static function main(){

            //Si no se indica un controlador, este es el controlador que se usará
            $controladorPredefinido = "inicio";

            //Si no se indica una accion, esta accion es la que se usará
            $accionPredefinida = "inicio";

            if(! empty($_GET['controlador'])){
                $controlador = $_GET['controlador'];
            }
            else    $controlador = $controladorPredefinido;

            frontController::autoloader($controlador); //nos encargamos de cargar el controlador y el modelo correctos
            include('./vistas/publicView.php');

            $controlador = $controlador . 'Controller';



            if(! empty($_GET['accion']))    $accion = $_GET['accion'];
            else if(! empty($_GET['titulo'])) $accion = "showArticle";
            else    $accion = $accionPredefinida;

            //Ya tenemos el controlador y la accion

            //Llamamos la accion o detenemos todo si no existe
            $controller = new $controlador();
            if(method_exists($controller,$accion)){
                  $controller->$accion();
            }
            else
                  die('La accion no existe - 404 not found');

        }

/////////////////////////////////////////////////////////////////////////////////////////////////
//Esta funcion se encarga de resolver el controlador y la accion solicitada, instanciar el     //
//objeto necesario y ejecutar el metodo requerido en panel.php                                 //
/////////////////////////////////////////////////////////////////////////////////////////////////

        public static function panel(){
            session_start();



            //Si no se indica un controlador, este es el controlador que se usará
            $controladorPredefinido = "sinSesion";

            //Si no se indica una accion, esta accion es la que se usará
            $accionPredefinida = "inicio";


            if(!empty($_SESSION['valid']) and $_SESSION['valid']== "SI"){
                $controlador = 'conSesion';
            }
            else{
                $controlador=$controladorPredefinido;
            }
            if(!empty($_GET['accion'])) $accion = $_GET['accion'];
            else $accion = $accionPredefinida;



            frontController::autoloader($controlador); //nos encargamos de cargar el controlador y el modelo correctos
            include('./modelos/articlesModel.php');;
            include('./vistas/panelView.php');

            $controlador = $controlador . 'Controller';

            //Ya tenemos el controlador y la accion

            //Llamamos la accion o detenemos todo si no existe
            $controller = new $controlador();
            if(method_exists($controller,$accion)){
                  $controller->$accion();
            }
            else
                  die('La accion no existe - 404 not found');
        }

    }

?>
