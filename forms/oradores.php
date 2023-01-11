<?php
include('serverOrador.php');
$my_query=mysqli_connect("localhost","root","","cac_2022");
// $my_query=mysqli_connect("localhost","id19634033_root","LoreConferenciaDB1*","id19634033_cac_2022");

$orNombre = $_POST['orador_nm'];
$orEmail = $_POST['orador_email'];
$temario = $_POST['temario'];

$buscaUser = $my_query->query("SELECT * FROM orador WHERE email ='$orEmail'");


if($buscaUser->num_rows==0){
$queryInsertar = "INSERT INTO orador (nombre, email, temario) VALUES('$orNombre', '$orEmail', '$temario')";

$insert = mysqli_query($my_query,$queryInsertar);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($my_query,"SELECT * FROM orador WHERE email = '$orEmail'");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
    function noAlertaMail() { 
      document.getElementById("alerta-orador-mail").style.display = 'none';
      window.location.href='../index.html#inscripcion';
  } 
    function alertaMail() {
      document.getElementById("alerta-orador-mail").style.display = 'block';    
}

</script>

<title>Read Data</title>

<link rel="stylesheet" type="text/css" href="../css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" type="text/css" href="../css/regData.css">
<link rel="stylesheet" type="text/css" href="../css/alerta.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">


</head>
<body>

<table class= 'titulo'>
<tr><th class = 'titulo'><h1>Bienvenido, <?php echo($orNombre. " " ) ?></h1></th></tr>
<tr><td class= 'titulo'><center><h2 class="centered-p"> Acá podés verificar si tus datos fueron registrados correctamente </h2></center></td></tr>


<div class='table-responsive'>
<table class='datos' style = 'width:55%'>
<caption><h2>ORADOR REGISTRADO<br><br></h2></caption>

<tr></tr> 
<tr class = 'datos' >
<th class='datos'><h3>Nombre</h3></th>
<th class='datos'><h3>E-mail</h3></th>
<th class='datos'><h3>Tema de la charla</h3></th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td class='datos' width ='10%'>" . $row['nombre'] . "</td>";
echo "<td class='datos' width ='10%'>" . $row['email'] . "</td>";
echo "<td class='datos' width ='30%'>" . $row['temario'] . "</td>";

echo "</tr>";
}
?>
</table>

<a id= "volver"><button type='button' class= 'btn-verde' id='btn_volver' onclick= "location.href='../index.html';">Volver</button></a>

</div>

<?php


}else if ($buscaUser->num_rows==!0) {

?>

<div class = "alerta" id="alerta-orador-mail" style= "display: block" >
      <span class="closebtn" onclick = noAlertaMail()>&times;</span>
      <div class="mensaje">
        <img src="../Images/email1.png" width= "15%" alt="alerta-mail-existente. Warning icons created by Freepik - Flaticon">
      <h2> El e-mail ya está registrado </h2>
</div>
</div>


<?php
}

?>

<footer>
    <div class="container">
        <div class="row">
  
          <div class="col footer-item ">
            <p>Preguntas frecuentes</p>
          </div>
  
          <div class="col footer-item">
            <p>Contactanos</p>
          </div>
  
          <div class="col footer-item">
            <p>Prensa</p>
          </div>
  
          <div class="col footer-item">
            <a class = "link-tickets " href="../tickets.html"><p class = "footer-item">Tickets</p></a>
          </div>
  
          <div class="col footer-item ">
            <p>Términos y condiciones</p>
          </div>
  
          <div class="col footer-item">
            <p>Privacidad</p>
          </div>
          <div class="col footer-item">
            <p>Estudiantes</p>
          </div>
          
        </div>
      </div>
    </footer>

</body>
</html>