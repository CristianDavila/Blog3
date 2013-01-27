<html>

            <?
            $url = "articulos";
            $vista = new publicView;
            $vista->plantilla($url);
            ?>
            <head>
                <title> Articulos </title>
            </head>
            <body>
                <div class="wrapper">
                    <div class="container">
                        <div class="hero-unit">
                            <div class="page-header">
                                <h2>Noticias</h2>
                            </div>
                            <article>

                                <dl> <?
                                foreach($valores as $noticia):
                                ?>

                                <div class="noticia">
                                    <dt><p> <a href="index.php?controlador=articles&titulo=<?=$noticia['titulo']?>">  <?=$noticia['titulo']?>  </a></p></dt>
                                    <blockquote> <dd> <?=$noticia['resumen']?> </dd>
                                </div>
                                <?php
                                endforeach;
                                ?> </dl>

                            </article>

                    <div class="span4 offset4">  <? $vista->paginacion(); ?> </div>
                <div class="push"></div>
            </div>


            <?$vista->footer();?>




</body>
</html>
