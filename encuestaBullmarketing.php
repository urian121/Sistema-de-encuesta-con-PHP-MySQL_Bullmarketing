<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bullmarketing :: Encuesta</title>
  <link type="text/css" rel="shortcut icon" href="assets/images/favicon.png"/>
  <link rel="stylesheet" href="assets/css/style_encuesta.css">
</head>
<body>
  
  <div id="logo">
    <a href="https://www.bullmarketing.com.co/">
      <img src="assets/images/Logo-bull.png" alt="Logo" style="padding: 5px; width:120px; float:right; position:absolute">
    </a>
  </div> 

<?php
include('config.php');
$id = $_REQUEST['id']; 
$idPersona = $_REQUEST['id']; 

$sqlPersona      = ("SELECT * FROM people_surveyed WHERE id='$idPersona'");
$querypersona    = mysqli_query($con, $sqlPersona);
$dataPersona     = mysqli_fetch_array($querypersona);


$sqlQuestions = ("SELECT * FROM myquestions");
$queryQuetion = mysqli_query($con, $sqlQuestions);
?>

<section>
<form action="create_encuesta.php" method="POST" class="modal-rating mt-2 mb-5">
    <input type="text" name="people_surveyed_id" value="<?php echo $idPersona = $_REQUEST['id']; ?>" hidden>
    <p>
      <?php echo $dataPersona['saludo']; ?>
    </p>

<div class="overlay"></div> 
<?php
	while ($dataQuetion = mysqli_fetch_array($queryQuetion)) { 
  $cadena= $dataQuetion['questions'];
  // echo $cadena =str_replace(' ', '', $cadena);
  // echo substr($cadena, 0, 10);

  switch ($dataQuetion['id']) {
    case '1':
      $str_cont = "One";
    break;
    case '2':
      $str_cont = "Two";
    break;
    case '3':
      $str_cont = "Three";
    break;
    default:break;
  }

?>
     <h2><?php echo utf8_encode($dataQuetion['questions']); ?></h2>
      <div class="rating" id="<?php echo $dataQuetion['id']; ?>">

        <input type="radio" name="pregunta<?php echo $str_cont; ?>" id="valor_pregunta<?php echo $str_cont; ?>_1" data-id="Hoa" value="1" required>
        <label class="inactivo" for="valor_pregunta<?php echo $str_cont; ?>_1">1</label>
    
        <input type="radio" name="pregunta<?php echo $str_cont; ?>" id="valor_pregunta<?php echo $str_cont; ?>_2" value="2" required>
        <label for="valor_pregunta<?php echo $str_cont; ?>_2">2</label>
    
        <input type="radio" name="pregunta<?php echo $str_cont; ?>" id="valor_pregunta<?php echo $str_cont; ?>_3" value="3" required>
        <label for="valor_pregunta<?php echo $str_cont; ?>_3">3</label>
    
        <input type="radio" name="pregunta<?php echo $str_cont; ?>" id="valor_pregunta<?php echo $str_cont; ?>_4" value="4" required>
        <label for="valor_pregunta<?php echo $str_cont; ?>_4">4</label>
    
        <input type="radio" name="pregunta<?php echo $str_cont; ?>" id="valor_pregunta<?php echo $str_cont; ?>_5" value="5" required>
        <label for="valor_pregunta<?php echo $str_cont; ?>_5">5</label>
      </div>
  <?php } ?>
    
    <button type="submit">Enviar encuesta</button>
</form>
</section>
<br><br>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(function () {
  $('[type*="radio"]').change(function (e) {
    e.preventDefault();

      var me = $(this).val();
      var id    =  $(this).attr("data-id");

     /* var element = $(this);
      $(element).toggleClass('red');*/
      $("inactivo").addClass("red");
   // $("#valor_preguntaOne_1").removeClass("red");

   $("#my_id").attr("class", "my_new_class_name");
   $("p:first").addClass("intro");

      console.log(me + id);
    }); 
});      
</script>
</body>
</html>