<html>
    <?php
    $vista = new panelView;
    $vista->plantillaPanel();
    ?>

    <body>
        <div class="container">

            <a class="btn" href="panel.php?accion=newArticle">Agregar Articulo</a
            <br/>
            <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>titulo</th>
                            <th>eliminar</th>
                            <th>editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?  foreach($valores as $noticia):  ?>

                        <tr>
                            <th>  <?=$noticia['id']?>  </th>
                            <th><a href="panel.php?accion=showArticle&titulo=<?=$noticia['titulo']?>">  <?=$noticia['titulo']?>  </a></th>
                            <th>
                                <a href="eliminar.php?id=<?=$noticia['id']?>">
                                <img src="internal-images/papelera.png" width="20" height="20">
                                </a>
                            </th>
                                <th>
                                    <a href="panel.php?accion=editArticle&titulo=<?=$noticia['titulo']?>">
                                        <img src="internal-images/lapiz.png" width="20" height="20">
                                    </a>
                            </th>
                        </tr>

                        <?
                            endforeach;
                        ?>

                    </tbody>
                </table>
            </hr>
        </div>
    </body>
</html>
