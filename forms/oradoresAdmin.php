<?php  include('serverOrador.php'); ?>
<?php 

// Si recibe el comando EDIT captura los datos
if (isset($_GET['edit'])) {
	$orID = $_GET['edit'];
	
  $record = mysqli_query($db, "SELECT * FROM `orador` WHERE ID = $orID");

		$n = mysqli_fetch_array($record);
		$orNombre = $n['nombre'];
		$orEmail = $n['email'];
        $temario = $n['temario'];
   
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
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    </style>
    
</head>
<body>

<a><button type='button' class= 'btnadmin btnMenuAdmin' id='btn_homepage' onclick= "location.href='../index.html';">Inicio</button></a>
<a><button type='button' class= 'btnadmin btnMenuAdmin' id='btn_admin2' onclick= "location.href='./admin.php';">Usuarios</button></a>


<?php 

if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM orador"); ?>


<!-- FORMULARIO PARA EDICION O INCORPORACIÓN DE NUEVO ORADOR  -->
<a name="EdicionOrador"></a>
<main>
       
<div class="row justify-content-center">
      <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
        
        <form  action="serverOrador.php" method="POST" role="form" class="php-email-form">
        </div>
          
         <input type="hidden" name="ID" value="<?php echo $orID; ?>">

         <table class= "datos">
          <caption><h2>EDICIÓN DE ORADORES</h2><br></caption>
        <tr> 
          <td>
             <label for="name">Nombre y Apellido</label>
          </td>
          <td>  
             <input type="text" name="nombre" class="usnm form-control" value="<?php echo $orNombre; ?>" id="or-nombre" minlength = "2" required>    
          </td>
          <td>
              <label for="name">Email</label>
          </td>
          <td>
              <input type="email" class="usnm form-control" value="<?php echo $orEmail; ?>" name="email" id="or-email" required>
          </td>
         
        <tr>
            <td>
                <label for="name">Temario</label>
            </td> 
            <td class = "temario" colspan = "3" rowspan = "10" >
                
            <textarea  id="" cols="90" rows="10" class="tema"  name="temario" id="temario" required><?php echo $temario; ?></textarea>
            </td>   
        </tr>
        </table>
         <div>
           <button type="submit" class= "btnadmin  " onclick = "window.location.href='#EdicionOrador';" id="btn_edit-orador" name = "update">Guardar</button>
        </div> 
        
      </form>
      </div>
      </div>
<br>

<!-- TABLA MOSTRANDO TODOS LOS REGISTROS Y OPCION EDIT O DELETE  -->
<a name='tablaOradores'></a>
<div class='table-responsive'>
<table class='datos' style = 'max-width: 65%'>
  
<caption><h2>ORADORES REGISTRADOS</h2><br></caption>
<tr class = 'datos' >
<th class='datos'><h3>ID</h3></th>
<th class='datos'><h3>Nombre y apellido</h3></th>
<th class='datos'><h3>E-mail</h3></th>
<th class='datos'><h3>Temática charla</h3></th>
<th class='accion' style = 'width: 2%'></th>
<th class='accion' style = 'width: 2%'></th>
</tr>
<?php
while($row = mysqli_fetch_array($results))
{
echo "<tr>";
echo "<td class='datos' width = '1%'>" . $row['ID'] . "</td>";
echo "<td class='datos' width = '10%'>" . $row['nombre'] . "</td>";
echo "<td class='datos' width = '10%'>" . $row['email'] . "</td>";
echo "<td class='datos' width = '30%'>" . $row['temario'] . "</td>"
?>

<td><a href="oradoresAdmin.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" type ="button" >Editar</a></td>

<td><a href="serverOrador.php?del=<?php echo $row['ID']; ?>" class="del_btn">Borrar</a></td>

</tr>
<?php }?>
 
<?php 
//  mysqli_close($record);
?>
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
