
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin de Asistentes Startups & Chelas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Script Ajax -->
    <script type="text/javascript">
      function showAsist(str){
        /*if (str==""){
         document.getElementById("txtAsistente").innerHTML='';
         return;
        }*/ if (window.XMLHttpRequest){
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("txtAsistente").innerHTML=xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","buscar_ajax.php?q="+str,true);
      xmlhttp.send();
  } 

  function eraseAsist(str){
      if(confirm('Realmete quieres borrar el asistente '+str+'?')){
        document.getElementById("txtMensaje").innerHTML='Asistente='+str;
        if (str==""){
          document.getElementById("txtMensaje").innerHTML='';
          return;
        } if (window.XMLHttpRequest){
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("txtMensaje").innerHTML=xmlhttp.responseText;
            showAsist('');
          }
        }

        xmlhttp.open("GET","borrar_ajax.php?q="+str,true);
        xmlhttp.send();
      } 
  }
  </script>

  </head>

  <body>

    <?php

      include'connection.php';

      $result = mysql_query('SELECT * FROM Asistente ORDER BY ID_Asist ASC');

      $reg = mysql_query('SELECT COUNT(*) FROM Asistente');

      $no_reg = mysql_fetch_array($reg);

      //Numero de Emprendedores, Programadores, Diseñadores, Empresarios, Inversionistas, Metiches
      $emprendedor = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Emprendedor'");
      $programador = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Programador'");
      $disenador = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Disenador'");
      $empresario = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Empresario'");
      $inversionista = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Inversionista'");
      $metiche = mysql_query("SELECT COUNT(*) FROM Asistente WHERE Tipo='Metiche'");

      $no_emp = mysql_fetch_array($emprendedor);
      $no_prog = mysql_fetch_array($programador);
      $no_dis = mysql_fetch_array($disenador);
      $no_empre = mysql_fetch_array($empresario);
      $no_inv = mysql_fetch_array($inversionista);
      $no_met = mysql_fetch_array($metiche);

    ?>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#"># <?php echo "$no_reg[0]"; ?> Registrados</a></li>
        </ul>
        <h3 class="muted">Registro Startups & Chelas</h3>
      </div>


      <br/>



      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Emprendedores</th>
            <th>Programadores</th>
            <th>Diseñadores</th>
            <th>Empresarios</th>
            <th>Inversionistas</th>
            <th>Metiches</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td># <?php echo"$no_emp[0]"; ?> </td>
            <td># <?php echo"$no_prog[0]"; ?> </td>
            <td># <?php echo"$no_dis[0]"; ?> </td>
            <td># <?php echo"$no_empre[0]"; ?></td>
            <td># <?php echo"$no_inv[0]"; ?></td>
            <td># <?php echo"$no_met[0]"; ?></td>
          </tr>
        </tbody>
      </table>

      <hr>
      <div id="txtMensaje"></div><br/>
      <p>Buscar por ID, Nombre, Email, Empresa/Institucion o Tipo de Asistente</p>
      <input type="text" class="input-large" placeholder="Buscar . . ." name="search" onkeypress="showAsist(this.value)" />
      <br /><br />

          <div class="bs-docs-example">
            <!-- Search Table -->
            <div id="txtAsistente">

            <!--Normal Table -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Empresa o Institución</th>
                  <th>Tipo de Asistente</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                  <?php

                    while($line = mysql_fetch_array($result, MYSQL_ASSOC)){
                      echo "<tr>";
                      foreach($line as $col_value){
                        echo "<td>$col_value</td>";
                      }

                      echo "<td>&nbsp;<a href='javascript:eraseAsist({$line['ID_Asist']})'><i class='icon-remove'></i></a></td>";

                      echo "</tr>";
                    }  

                  ?>

              </tbody>
            </table>
          </div>
          </div>

      <hr>

      <div class="footer">
        <p>Evento Startups & Chelas </p>
      </div>

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
