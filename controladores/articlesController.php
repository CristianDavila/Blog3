<?php

    class articlesController{

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
            $plantilla->motor("articulos", $articles);
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
    }

?>
