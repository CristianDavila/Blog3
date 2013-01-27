<?php
class coreView{




    public function __construct(){

    }

    public static function plantilla($url){
            $config = Config::constructor();

            if($url == "index"){
                $inicio = "active";
            }
            else if($url =="contacto"){
                $contacto = "active";
            }
            else if ($url == "articulos") $contenido = "active";
            ?>


            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
                <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">
                <style type="text/css">
                html, body {height: 100%;}
                body{
                 background: url(<?=$config->get('fondo');?>) no-repeat center center fixed;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;

                 }
                 .wrapper {
                 min-height: 57%;
                 height: auto !important;
                 height: 100%;
                 margin: 0 auto -4em;
                 }
                 .footer, .push {
                 height: 4em;
                 }



                </style>
                <link type="image/x-icon" rel="shortcut icon" href="<?=$config->get('logo');?>" />
            </head>
            <div class="container">
                <header>
                    <div class="row">
                        <div class="span12">
                            <a href="index.php">
                                <img src="<?=$config->get('logo2');?>">
                            </a>
                        </div>
                    </div>

                    <div align="center">
                        <img src="<?=$config->get('cabecera');?>"  width="1170" height="185">
                    </div>

                    <div class="container">
                        <div class="navbar">
                                <div class="navbar-inner" >


                                            <ul class="nav">

                                                <li class="<?=$inicio;?>">
                                                    <a href="index.php">Inicio</a>
                                                </li>
                                                <li class="<?=$contenido;?>">
                                                    <a href="index.php?controlador=articles">Articulos</a>
                                                </li>

                                                <li class="<?=$contacto;?>">
                                                    <a href="index.php?controlador=contacto">Contacto</a>
                                                </li>

                                            </ul>


                                </div>
                            </div>
                        </div>
                </header>
            </div>
        <?

        }

        public static function paginacion(){


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
                            <li><a href="index.php?controlador=articles">Pre</a></li>
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
                            <li><a href="index.php?controlador=articles&paginaActual=<?=$paginaActual?>">Next</a></li>
                    <?
                        }
                    ?>

                </ul>
            </div>
            <?
        }

        public static function footer(){

        ?>

            <div class="footer">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span4"> </div>
                        <div class="span4 offset4">
                            <h5>Powered by Bootstrap from Twitter <br/>
                            Diseñado y programado por Cristian Dávila</h5>
                        </div>
                        <div class="span4 offset8">
                            <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_ES"><img alt="Licencia de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_ES">Creative Commons</a>.

                        </div>
                    </div>
                </div>
            </div>
        <?
        }





}
?>
