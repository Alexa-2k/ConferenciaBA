<?php  
include('server_guest.php');
// include('users.php');
?>

<?php
// Si recibe el comando EDIT captura los datos
// if (isset($_GET['edit'])) {
// 	$ID = $_GET['edit'];
	
//   $record = mysqli_query($db, "SELECT * FROM `usuario` WHERE ID = $ID");

// 		$n = mysqli_fetch_array($record);
// 		$nombre = $n['nombre'];
// 		$apellido = $n['apellido'];
//     $username = $n['username'];
//     $email = $n['email'];
//     $password = $n['pwd'];
//     $user_type = $n['user_type'];   
//   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script>
function noAlertaUser() { 
    document.getElementById("alerta-user").style.display = 'none';
    window.location.href='../registro.html';
} 
function alertaUser() {
    document.getElementById("alerta-user").style.display = 'block';
}
    function noAlertaMail() { 
    document.getElementById("alerta-mail").style.display = 'none';
    window.location.href='../registro.html';
} 
function alertaMail() {
    document.getElementById("alerta-mail").style.display = 'block';    
}

</script>


<title>User managing</title>
<link rel="stylesheet" type="text/css" href="../css/header.css">

<link rel="stylesheet" type="text/css" href="../css/alerta.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">
<link rel="stylesheet" type="text/css" href="../css/regData.css">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">


<style> 
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap'); </style>

</head>

<body>
 
<?php

$my_query=mysqli_connect("localhost","id19634033_root","LoreConferenciaDB1*","id19634033_cac_2022");
// ("localhost","root","","cac_2022");
$nombre = $_POST['name'];
$apellido = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pwd'];

$buscaUser = $my_query->query("SELECT * FROM usuario WHERE username ='$username'");
$buscaMail = $my_query->query("SELECT * FROM usuario WHERE email ='$email'");

if(($buscaUser->num_rows==0) && ($buscaMail->num_rows==0)){
    $queryInsertar = "INSERT INTO usuario (apellido, nombre, username, email, pwd) VALUES('$apellido', '$nombre', '$username', '$email', '$password')";

    $insert = mysqli_query($db,$queryInsertar);

    // // Check connection
    // if (mysqli_connect_errno())
    // {
    // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

$result = mysqli_query($db,"SELECT * FROM usuario WHERE username = '$username'");

    // 
    ?>

        <!-- TABLA MUESTRA DATOS INGRESADOS  -->
        <table class= 'titulo' >
            <tr><th class = 'titulo'><h1>Bienvenido, <?php echo($nombre. " ". $apellido) ?></h1></th></tr>
            <tr><td class= 'titulo'><center><h2 class="centered-p"> Acá podés verificar y editar los datos ingresados </h2></center></td></tr>

        </table>

        <div class='table-responsive'>
          <table class='datos'>
            <caption><h2>USUARIO REGISTRADO <br><br></h2></caption>
            
          <tr></tr> 

          <tr class = 'datos' >
            <th class='datos'><h3>Apellido</h3></th>
            <th class='datos'><h3>Nombre</h3></th>
            <th class='datos'><h3>Usuario</h3></th>
            <th class='datos'><h3>E-mail</h3></th>
            <th class='datos'><h3>Password</h3></th>
            <th class='accion'><h3>Acción</h3></th>
          </tr>

          <?php
            while($row = mysqli_fetch_assoc($result))
            {
            echo "<tr>";
              echo "<td class='datos'>" . $row['apellido'] . "</td>";
              echo "<td class='datos'>" . $row['nombre'] . "</td>";
              echo "<td class='datos'>" . $row['username'] . "</td>";
              echo "<td class='datos'>" . $row['email'] . "</td>";
              echo "<td class='datos'>" . $row['pwd'] . "</td>";
              
          ?>

        <td><a href="users.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" type ="button" >Editar</a></td> -->
        <td><a href="server_guest.php?del=<?php echo $row['ID']; ?>" class="del_btn">Borrar</a></td>
        </tr>

      <?php }?>

    </table>
      </div>

      <div class='row justify-content-center'>
      <button type='button' class= 'btn-verde' id='btn_logOK' onclick= "location.href='../registro.html#login';">Logueate</button>

      </div> 

<!-- ================ EDICION DE USUARIO ================ -->
 <!-- <a name='Edicion'></a>
  <div class="row justify-content-center">
  <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">
    
    <form  action="server_guest.php" method="POST" role="form" class="php-email-form">
    </div>
      
    <input type="hidden" name="ID" value="< ?php echo $ID; ?>">

    <table class= "datos">
      <caption><h2> EDICIÓN DE USUARIO</h2><br></caption>
    <tr> 
      <td>
        <label for="name">Apellido</label>
      </td>
      <td>  
        <input type="text" name="apellido" class="usnm form-control" value="< ?php echo .$apellido; ?>" id="apellido" minlength = "2" required>
      </td>
      <td>
        <label for="name">Nombre</label>
      </td>
      <td>
        <input type="text" name="nombre" class="usnm form-control" value="< ?php echo .$nombre; ?>" id="nombre" minlength = "2" required>
              
      </td>
    
      <tr>        
        <td>    
          <label for="name">Username</label>
        </td>
        <td>
          <input type="text" class="idus  form-control" value="< ?php echo .$username; ?>" name="username" id="username" required>
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="name">Email</label>
        </td>
        
        <td>
          <input type="email" class="usnm form-control" value="< ?php echo $email; ?>" name="email" id="email" required>
        </td>
        
        <td>
          <label for="name">Password</label>
        </td>
        
        <td>
        <input type="text" class="usnm form-control" value="< ?php echo $password; ?>" name="pwd" id="pwd" required>
        </td>
      
      </tr>
    </table> 
      <div>
      <button type="submit" class= "btnadmin btn-registro " onclick = "window.location.href='#Edicion';" id="btn_edit" name = "update">Guardar</button>
      </div>    
  </form>
  </div>-->

<?php 

}else if ($buscaUser->num_rows==!0) {
  
?>

<div class = "alerta" id="alerta-user" style= "display: block" >
<span class="closebtn" onclick = noAlertaUser()>&times;</span>
      <div class="mensaje">
        <img src="../Images/warning2.png" width= "15%" alt="alerta-usuario-existente. Warning icons created by Freepik - Flaticon">
      <h2> El nombre de usuario ya existe </h2>
</div>
</div>


<?php
}else if ($buscaMail->num_rows==!0){

?>
<div class = "alerta" id="alerta-mail" style= "display: block" >
      <span class="closebtn" onclick = noAlertaMail()>&times;</span>
      <div class="mensaje">
        <img src="../Images/email1.png" width= "15%" alt="alerta-mail-existente. Warning icons created by Freepik - Flaticon">
      <h2> Ese e-mail ya está registrado </h2>
</div>
</div>

<?php } ?>
 

</div>
</div>

    
</body>
</html>