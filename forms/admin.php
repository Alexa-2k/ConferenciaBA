<?php  include('server.php'); ?>
<?php
// Si recibe el comando EDIT captura los datos
if (isset($_GET['edit'])) {
	$ID = $_GET['edit'];
	
  $record = mysqli_query($db, "SELECT * FROM `usuario` WHERE ID = $ID");

		$n = mysqli_fetch_array($record);
		$nombre = $n['nombre'];
		$apellido = $n['apellido'];
    $username = $n['username'];
    $email = $n['email'];
    $password = $n['pwd'];
    $user_type = $n['user_type'];   
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Admin</title>

<title>Admin</title>
<!-- <link rel="stylesheet" type="text/css" href="../css/registro.css">   -->
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<link rel="stylesheet" type="text/css" href="../css/regData.css">
<link rel="stylesheet" type="text/css" href="../css/alerta.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>
<body>

<a><button type='button' class= 'btnadmin btnMenuAdmin' id='btn_homepage' onclick= "location.href='../index.html';">Inicio</button></a>

<a><button type='button' class= 'btnadmin btnMenuAdmin' id='btn_orador' onclick= "location.href='./oradoresAdmin.php#tablaOradores';">Oradores</button></a>


<?php 

if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM usuario"); ?>

<main>
<!-- FORMULARIO PARA EDICION DE USUARIO  -->
<a name="Edicion"></a>



    <div class="row justify-content-center">
      <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">
        
        <form  action="server.php" method="POST" role="form" class="php-email-form">
        </div>
          
         <input type="hidden" name="ID" value="<?php echo $ID; ?>">

         <table class= "datos">
          <caption><h2>EDICIÓN DE USUARIOS</h2><br></caption>
        <tr> 
          <td>
             <label for="name">Apellido</label>
          </td>
          <td>  
             <input type="text" name="apellido" class="usnm form-control" value="<?php echo $apellido; ?>" id="apellido" minlength = "2" required>
          </td>
          <td>
             <label for="name">Nombre</label>
          </td>
          <td>
            <input type="text" name="nombre" class="usnm form-control" value="<?php echo $nombre; ?>" id="nombre" minlength = "2" required>
                   
          </td>
         
          <tr>        
            <td>    
              <label for="name">Username</label>
            </td>
            <td>
              <input type="text" class="idus  form-control" value="<?php echo $username; ?>" name="username" id="username" required>
            </td>
          </tr>
          
          <tr>
            <td>
              <label for="name">Email</label>
            </td>
            
            <td>
              <input type="email" class="usnm form-control" value="<?php echo $email; ?>" name="email" id="email" required>
            </td>
            
            <td>
              <label for="name">Password</label>
            </td>
            
            <td>
            <input type="text" class="usnm form-control" value="<?php echo $password; ?>" name="pwd" id="pwd" required>
            </td>
          
          </tr>
        </table>
          <div>
           <button type="submit" class= "btnadmin btn-registro " onclick = "window.location.href='#Edicion';" id="btn_edit" name = "update">Guardar</button>
           </div>    
      </form>
      </div>
    </div>
  </div>
          
<br>

<!-- TABLA MOSTRANDO TODOS LOS REGISTROS Y OPCION EDIT O DELETE  -->

<div class='table-responsive'>
<table class='datos'>
  
<caption><h2>USUARIOS REGISTRADOS</h2><br></caption>
<tr class = 'datos' >
<th class='datos'><h3>ID</h3></th>
<th class='datos'><h3>Apellido</h3></th>
<th class='datos'><h3>Nombre</h3></th>
<th class='datos'><h3>Usuario</h3></th>
<th class='datos'><h3>E-mail</h3></th>
<th class='datos'><h3>Password</h3></th>
<th class='datos'><h3>Tipo User</h3></th>
<th class='accion'></th>
<th class='accion'></th>
</tr>
<?php
while($row = mysqli_fetch_array($results))
{
echo "<tr>";
echo "<td class='datos'>" . $row['ID'] . "</td>";
echo "<td class='datos'>" . $row['apellido'] . "</td>";
echo "<td class='datos'>" . $row['nombre'] . "</td>";
echo "<td class='datos'>" . $row['username'] . "</td>";
echo "<td class='datos'>" . $row['email'] . "</td>";
echo "<td class='datos'>" . $row['pwd'] . "</td>";
echo "<td class='datos'>" . $row['user_type'] . "</td>"
?>

<td><a href="admin.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" type ="button" >Editar</a></td>

<td><a href="server.php?del=<?php echo $row['ID']; ?>" class="del_btn">Borrar</a></td>

</tr>
<?php } ?>


</table>
</div>
<br>

</main>

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
