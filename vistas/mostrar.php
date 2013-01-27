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
                            <h2> <? echo $valores[1]; ?> </h2>
                            <h5> <? echo $valores[2]; ?> </h5>
                        </div>

                        <p> <?echo "<td>".$valores[0]."</td>\n";  ?> </p>

                     <div align=center>
                    <div class="pagination">
                        <ul>
                            <li> <a href="javascript:history.go(-1);""> Volver </a> </li>
                        </ul>
                    </div>
                </div>

            </div>
            </div>
            <div class="push"></div>
        </div>

        <?$vista->footer();?>
    </body>
</html>
