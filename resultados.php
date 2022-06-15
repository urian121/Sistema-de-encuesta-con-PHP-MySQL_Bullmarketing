<?php
  include('config.php');
  $sql      = ("SELECT people_surveyed.name_people, GROUP_CONCAT(resp ORDER BY myquestion_id) FROM answer INNER JOIN people_surveyed ON answer.people_surveyed_id = people_surveyed.id GROUP BY people_surveyed.name_people;");
  $queryRespuestas    = mysqli_query($con, $sql);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>
    <title>Bullmarketing</title>
    <style>
      .list-group-item.active{
        background-color: #fd7e14 !important;
        border-color: #fd7e14;
      }

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
        </div>
    </nav>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Pregunta 1</th>
            <th scope="col">Pregunta 2</th>
            <th scope="col">Pregunta 3</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($dataRespuestas = mysqli_fetch_array($queryRespuestas)) {
          $respuestas = explode (",", $dataRespuestas['GROUP_CONCAT(resp ORDER BY myquestion_id)']);
          ?>
          <tr>
            <td><?php echo $dataRespuestas['name_people']; ?></td>
            <td>
              <?php 
                for ($i=0; $i <$respuestas[0]; $i++) { 
                  echo "<i class='fa-solid fa-star'></i>";
                }
              ?>              
            </td>
            <td>
              <?php 
                for ($i=0; $i <$respuestas[1]; $i++) { 
                  echo "<i class='fa-solid fa-star'></i>";
                }
              ?>              
            </td>
            <td>
              <?php 
                for ($i=0; $i <$respuestas[2]; $i++) { 
                  echo "<i class='fa-solid fa-star'></i>";                }
              ?>              
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>