

<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">
    <title> Inicio de sesion</title>
    <link type="image/x-icon" rel="shortcut icon" href="./public-images/logo.jpg" />
</head>
<header>

<body>

<div class="container">
<div class="row">
  <div class="span6 offset3">
        <form class="form-horizontal" action="panel.php?controlador=sinSesion&accion=validar" method="post">
            <fieldset>
                <legend>Inicia sesion</legend>
                <div class="control-group">
                    <label class="control-label" for="input01">Usuario</label>
                    <div class="controls">
                        <input type="text" name="usuario" class="input-xlarge" id="input01" placeholder="Introduzca su usuario">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input01">Password</label>
                    <div class="controls">
                        <input type="text" name="password" class="input-xlarge" id="input01" placeholder="Introduzca su Password">
                    </div>
                </div>

                <div class="form-actions">

                    <input type="submit" class="btn btn-primary" name="peticion" value="Entrar" />

                </div>

            </fieldset>
      </form>
</div>
</div>
</div>
</body>
</html>
