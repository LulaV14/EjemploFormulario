
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registro de Asistentes Startups & Chelas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/ninja.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body style="background:#d30039;">
  <!--<body style="background:#3f3f3f;">-->

    <?php

        include'connection.php';

        if(isset($_POST[submit])){
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $empresa = $_POST["empresa"];
            $tipo = $_POST["tipo"];

            //Ver si se pone el foreach
            foreach($tipo as $value){
                $tipoNombre = $value;
            }

            $sql = "INSERT INTO Asistente(Nombre, Email, Empresa, Tipo) VALUES ('$nombre', '$email', '$empresa', '$tipoNombre')";
        }

    ?>

    <div class="container">

      <form class="form-signin" name="formulario" action="index.php" method="POST">
        <h2 class="form-signin-heading">Registro de Asistentes</h2>

        <img src="http://s3.amazonaws.com/ninjacode/images/startups&chelas.jpg" style="margin-bottom:20px;">

        <div id="txtAlerta">
            <?php

                if(isset($_POST[submit])){
                    if($nombre=="" OR $email=="" OR $empresa="" OR $tipoNombre == ""){
                        echo "<div class='alert alert-block'><button type='button' class='close' data-dismiss='alert'>x</button><b>Cuidado!!</b><br/>Favor de llenar todos los campos . . .</div>";
                        echo $nombre;
                        echo $email;
                        echo $empresa;
                        echo $tipoNombre;
                    } else if(mysql_query($sql)){
                        echo '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Registrado!</h4>Gracias por particiar en el evento Mind Your Business del Tecnológico de Monterrey Campus Laguna ...</div>';
                    }
                }

            ?>

        </div>
        
        <br/><br/>

        <label>Nombre</label>
        <input type="text" class="input-block-level" placeholder="Nombre Completo . . ." name="nombre">
        
        <label>Email</label>
        <input type="text" class="input-block-level" placeholder="Email . . ." name="email">
        
        <label>Empresa o Institución</label>
        <input type="text" class="input-block-level" placeholder="Empresa o Institución . . ." name="empresa">

        <label>Tipo de Asistente</label>
        <select name="tipo[]">
            <option value="">Selecciona . . .</option>
            <option value="Emprendedor">Emprendedor</option>
            <option value="Programador">Programador</option>
            <option value="Disenador">Diseñador</option>
            <option value="Empresario">Empresario</option>
            <option value="Inversionista">Iversionista</option>
            <option value="Metiche">Metiche</option>
        </select>        
       
        <br>
        <hr>
        <button class="btn btn-large btn-primary" type="submit" name="submit">Participar</button>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
