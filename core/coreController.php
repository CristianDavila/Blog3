<?php

    class coreController{



        public static function paginacion($url){

                //Comprobamos la pagina actual extrayendo el parametro 'paginaActual' de la url y comprobamos su contenido
                if(empty($_GET['paginaActual'])) $paginaActual = 1;
                else $paginaActual = $_GET['paginaActual'];

                $db = conexionDb();

                $consulta = $db->prepare('SELECT * FROM articulos ORDER BY id DESC LIMIT 1');
                $consulta->execute();
                $id = $consulta->fetch();
                $paginasTotales = ceil($id['id']/10);

                ?>

                <div class="pagination">
                    <ul>
                        <?
                            if($paginaActual > 1){
                                ?>  <li><a href="<?=$url?>">Pre</a></li>    <?
                            }
                        ?>

                        <li class="active">
                            <a><strong>Pagina numero <? echo $paginaActual; ?> de <? echo $paginasTotales; ?></strong></a>
                        </li>

                        <?
                            if($paginaActual < $paginasTotales){
                                ++$paginaActual;
                                ?>  <li><a href="panel.php?paginaActual=<?=$paginaActual?>">Next</a></li>   <?
                            }
                        ?>
                    </ul>
                </div>
                <?
                $db = null;
            }

    function showArticle(){
        $titulo = $_GET['titulo'];
        ?>
        <div class="container">
            <div class="hero-unit">

                <div class="page-header">
                    <h2> <? echo $titulo; ?> </h2>
                </div>

                <?php
                    // Conectamos a la base de datos
                    $db = conexionDb();


                    // Obtenemos noticias
                    $consulta = $db->prepare('SELECT * FROM articulos WHERE titulo= ?');
                    $consulta->execute(array($titulo)); //de esta forma evitamos SQL injection

                    $articulo = $consulta->fetch();
                    $contenido =$articulo['contenido'];
                    ?> <p> <?echo "<td>".$contenido."</td>\n";  ?> </p> <?

                    // Cerramos conexion con la base de datos
                    $db = null;
                ?>

                <div align=center>
                    <div class="pagination">
                        <ul>
                            <li> <a href="javascript:history.go(-1);""> Volver </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?
    }




    }

?>
