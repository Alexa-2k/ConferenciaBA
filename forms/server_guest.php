<?php 
	session_start(); 
	$db = mysqli_connect("localhost","id19634033_root","LoreConferenciaDB1*","id19634033_cac_2022");
	// ('localhost', 'root', '', 'cac_2022')
	// inicializa variables
	$nombre = "";
	$apellido = "";
	$email = "";
	$password = "";
	$username = "";
	$ID = 0;
	$update = true;


	if (isset($_POST['update'])) {
		$ID = $_POST['ID'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['pwd'];

		mysqli_query($db, "UPDATE usuario SET nombre='$nombre', apellido='$apellido', username ='$username', email = '$email', pwd = '$password' WHERE ID=$ID");
		$_SESSION['message'] = "Usuario actualizado!"; 
		header('location: ../registro.html#login');
        exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de usuario</title>
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
<?php   

if (isset($_GET['del'])) {
	$ID = $_GET['del'];
	mysqli_query($db, "DELETE FROM usuario WHERE ID=$ID");

?>
    <div class = "alerta-loginOK" id="alerta-delete" style= "display: block" >
    <span class="closebtn" onclick = "window.location.href='../index.html';" >&times;</span>
          <div class="mensaje">
            <img src="../Images/1632603.png" width= "15%" alt="usuario-eliminado. Flaticon">
          <h2> Usuario eliminado </h2>
    </div>
    </div>
    
   <?php } ?>
   </body>
</html>
