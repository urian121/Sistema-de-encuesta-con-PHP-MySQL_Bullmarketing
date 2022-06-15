<?php
session_start();
include('config.php');
if (isset($_SESSION['email']) != "") {
    $nameUser   = $_SESSION['fullName'];
    $email      = $_SESSION['email'];
    $idUser     = $_SESSION['id'];
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--metas de Whatsapp-->
    <meta property="og:title" content="Bullmarketing - Agencia Digital"/>
    <meta property="og:image" content="https://www.bullmarketing.com.co/wp-content/uploads/2022/02/Logo-bull-negro_2.png"/>
    <meta property="og:description" content="Encuesta realizada por Bullmarketing"/>
    <meta property="og:type"  content="https://www.bullmarketing.com.co/"/>
    <meta property="og:url"   content="https://bullmarketing.com.co/"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link type="text/css" rel="shortcut icon" href="assets/images/favicon.png"/>
    <title>Bullmarketing :: <?php echo $nameUser; ?></title>
    <style>
      .bi-arrow-counterclockwise{
        font-size: 20px;
        font-weight: bold;
      }
      #linkSalir:hover{
        cursor: pointer;
        color: #f05a22 !important;
      }
      .btnSpecial{
        width: 100%;
        background-color: #f05a22;
        color: #fff;
        border: none;
      }
      .btnSpecial:hover{
        cursor: pointer;
        background-color: #f05a22 !important;
        color: #f9f9f9;
        opacity: 0.9;
      }
      .bi{
        font-size: 25px;
      }
      .bi-whatsapp:hover{
        cursor: pointer;
        color: green;
      }
      .bi-file-earmark-code:hover{
        cursor: pointer;
        color: #888;
      }
    </style>
  </head>
  <body>
<nav class="navbar navbar-light bg-light mb-5" style="background-color: #fff !important; box-shadow: 0 0 30px 0 rgb(0 0 0 / 20%);">
  <div class="container-fluid">
      <img src="assets/images/Logo-bull.png" alt="" width="150" height="50" class="d-inline-block align-text-top">
    <span>
      <a id="linkSalir" href="cerrar.php" style="color: #555;" title="Salir">
        <i class="bi bi-arrow-counterclockwise"></i>
        Salir
      </a>
  </span>
  </div>
</nav>


<div class="container">

<?php
if(isset($_REQUEST['c'])){ ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Felicitaciones!</strong> Acaba de iniciar sesión correctamente..
  </div>
<?php } ?>


  <div class="row text-center">
    <div class="col-md-5 p-md-4 mb-5" style="background-color: #f9f9f9; border-radius:5px;">
      <form action="create_persona_encuesta.php" method="POST">
        <h2 style="color: #f05a22; font-weight:800;">Crear encuesta <hr></h2>
        <div class="form-group mb-2">
          <label for="persona_encuestada" style="float:left;">
          <strong>
            Nombre de la Persona
          </strong>
          </label>
          <input type="text" name="name_people" class="form-control">
        </div>

        <div class="form-group">
          <label for="saludo" style="float:left;">
          <strong>
            A quién va dirigida la encuesta?
          </strong>
        </label>
          <textarea class="form-control" name="saludo" rows="8">Hola, Viviana un gustos en saludarte, oye para nuestro equipo de Bullmarketing es importante tu opinión, por lo que nos gustaría que llenarás esta pequeña encuesta.</textarea>
        </div>
        <button type="submit" class="btn btn-info btn-lg btn-block mt-3 btn-lg btnSpecial mb-5">Encuesta</button>
      </form>
    </div>

<?php
$sqlEncuestas = ("SELECT * FROM people_surveyed");
$queryEncuesta = mysqli_query($con, $sqlEncuestas);
?>
  <div class="col-md-7">
    <h2 style="color: #f05a22; font-weight:800;">Encuestas Registradas<hr></h2>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Para</th>
            <th style="text-align:right;">Compartir</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $a=1;
        while ($dataEncuesta = mysqli_fetch_array($queryEncuesta)) { ?>
          <tr>
            <th scope="row"><?php echo $a; ?></th>
            <td><?php echo $dataEncuesta['name_people']; ?></td>
            <td style="text-align:right;">
                <a href="https://api.whatsapp.com/send?phone=&text=Bullmarketing - link de encuesta: https://encuesta.bullmarketing.com.co/encuestaBullmarketing.php?id=<?php echo $dataEncuesta['id']; ?>" target="_blank" title="Compartir por WhtasApp" style="padding: 0px 25px;">
                  <i class="bi bi-whatsapp"></i>
                </a>

                <a onclick="copiarAlPortapapeles(this)" data-id="<?php echo $dataEncuesta['id']; ?>" rel="noopener" title="Copiar Link para compartir">
                    <i class="bi bi-file-earmark-code"></i>
                </a>
            </td>
          </tr>
        <?php $a ++; } ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-12">
        <center>
            <a href="resultados.php" type="button">Resultados encuesta</button>
        </center>
    </div>
  </div>

  </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf-8">
function copiarAlPortapapeles(elem) {
    let data_id = elem.getAttribute('data-id');
    var aux = document.createElement("input");
    aux.setAttribute("value", `${window.location.hostname}/encuestaBullmarketing.php?id=${data_id}`);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
}
</script>

  </body>
</html>

<?php 
} else { ?>
<script type="text/javascript">
    location.href="cerrar.php";
</script>
<?php }   
?>
