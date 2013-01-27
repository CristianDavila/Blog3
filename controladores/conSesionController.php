<?php

    class conSesionController {

        public static function inicio(){



            //Seleccionamos la pagina correcta a mostrar
            if(empty($_GET['paginaActual'])){
                //si la pagina actual es '0', entrara aqui, pensando que esta vacio, y no producira fallos
                $limit = 0;
            }
            else{
               $pagina = $_GET['paginaActual'];
               if(!(is_numeric($pagina)) or ($pagina <  '1')){
                   header( 'Location: error.php' );
                   exit();
               }
               $limit = ($pagina-1)*10;
            }
            $model = new articlesModel;
            $articles = $model->articulos($limit);
            if(! empty($_GET['paginaActual'])){
                $paginaActual = $_GET['paginaActual'];
                $paginasTotales = $model->paginacionConexion();
            }
            else {
                $paginaActual = 1;
                $paginasTotales = 0;
            }

            $plantilla = new vistasMotor;
            $plantilla->motor("conSesion", $articles);


        }
        public static function showArticle(){


            $titulo = $_GET['titulo'];
            $model = new articlesModel;
            $articulo = $model->mostrarArticulo($titulo);
            $contenido = $articulo['contenido'];
            $fecha = $articulo['fecha'];

            // Cerramos conexion con la base de  datos

            $valores = array($contenido, $titulo, $fecha);
            $plantilla = new vistasMotor;
            $plantilla->motor("mostrar", $valores);
        }


        public static function newArticle(){

            $plantilla = new vistasMotor;
            $plantilla->motor("articlesEdition", "crear");
        }

        public static function editArticle(){
            $titulo = $_GET['titulo'];
            $model = new articlesModel;
            $articulo = $model->mostrarArticulo($titulo);


            $plantilla = new vistasMotor;
            $plantilla->motor("articlesEdition", $articulo);
        }
        public static function actualizar(){
            $contenido = $_POST['contenido'];
            $titulo = $_POST['titulo'];
            $resumen = $_POST['resumen'];
            $id = $_GET['id'];
            $valores = array($contenido, $titulo, $resumen, $id);
            $model = new articlesModel;
            $articulo = $model->actArticulo($valores);
            header( 'Location: panel.php' );
            exit();
        }

        public static function registrar(){
            $contenido = $_POST['contenido'];
            $titulo = $_POST['titulo'];
            $resumen = $_POST['resumen'];
            $valores = array($contenido, $titulo, $resumen);
            $model = new articlesModel;
            $articulo = $model->regArticulo($valores);
            header( 'Location: panel.php' );
            exit();
        }

        public static function cerrarSesion(){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['password'] = $pass;
            $_SESSION['valid']= "NO";
            unset($_SESSION['usuario']);
            unset($_SESSION['password']);
            unset($_SESSION['repassword']);
            header("Location: panel.php");
            exit();
        }



    }
?>
