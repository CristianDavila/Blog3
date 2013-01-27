
<html>
    <head>
        <title> Pagina de inicio </title>
    </head>

    <?
        $url = "index";
        $vista = new publicView;
        $vista->plantilla($url);
    ?>

    <body >
        <div class="wrapper">
                <div class="container">
                    <div class="hero-unit">
                        <h3> Bienvenidos a thexplorer! </h3>
                        <p> el blog bla bla bla </p>
                    </div>
                </div>
        </div>
        <?$vista->footer();?>
    </body>

</html>
