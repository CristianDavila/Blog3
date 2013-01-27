<?php
/////////////////////FUNCIONES PARA EL PANEL DE CONTROL////////////////////////////////////////////////////////
class panelView{
        public static function plantillaPanel(){
            ?>

            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
                <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">
                <title> Panel de Control </title>
                <link type="image/x-icon" rel="shortcut icon" href="public-images/logo.jpg" />
            </head>
            <header>
                <div class="navbar">
                    <div class="navbar-inner" >
                    <ul class="nav nav-pills">
                      <li class="active">
                      <h3> Panel de Control </h3>
                      <?
                      echo 'Bienvenido/a ';
                      echo $_SESSION['usuario'];
                      ?>
                      </li>
                      <li><a href="panel.php?controlador=conSesion&accion=cerrarSesion"><button type="button">Cerrar sesion</button></a></li>
                      <li><a href="index.php"><button type="button">Ir a la pagina Principal</button></a></li>
                     <? if ($_SESSION['root']=="YES"){ ?>
                      <li><a href="/"><button type="button">Editar usuarios</button></a></li>
                     <? } ?>
                    </ul>

                    <br/><br/><br/>
                    </div>

                </div>
            </header>

        <?


        }
        public static function paginacionPanel(){


            if(empty($_GET['paginaActual'])) $paginaActual = 1;
            else $paginaActual = $_GET['paginaActual'];

            $model = new articlesModel;
            $paginasTotales = $model->paginacionConexion();

            ?>



            <div class="pagination">
                <ul>

                    <?
                        if($paginaActual > 1){
                    ?>
                            <li><a href="panel.php">Pre</a></li>
                    <?
                        }
                    ?>

                    <li class="active">
                        <a><strong>Pagina numero <? echo $paginaActual; ?> de <? echo $paginasTotales; ?></strong></a>
                    </li>

                    <?
                        if($paginaActual < $paginasTotales){
                            $paginaActual = $paginaActual + 1;
                    ?>
                            <li><a href="panel.php?paginaActual=<?=$paginaActual?>">Next</a></li>
                    <?
                        }
                    ?>

                </ul>
            </div>
            <?
        }
}

?>
