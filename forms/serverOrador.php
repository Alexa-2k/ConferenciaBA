<?php 
	session_start();
	$db = mysqli_connect("localhost","id19634033_root","LoreConferenciaDB1*","id19634033_cac_2022");
	// ('localhost', 'root', '', 'cac_2022');

	// inicializa variables
	$orNombre = "";
	$orEmail = "";
    $temario="";
    $orID = 0;

    $update = true;
	

	if (isset($_POST['update'])) {
		$orID = $_POST['ID'];
		$orNombre = $_POST['nombre'];
		$orEmail = $_POST['email'];
		$temario = $_POST['temario'];

		mysqli_query($db, "UPDATE orador SET nombre='$orNombre', email = '$orEmail', temario = '$temario' WHERE ID=$orID");
		$_SESSION['message'] = "<br>"."<h2>Datos de orador actualizados!</h2>"."<br>"; 
		header('location: oradoresAdmin.php');
		exit();
}


if (isset($_GET['del'])) {
	$orID = $_GET['del'];
	mysqli_query($db, "DELETE FROM orador WHERE ID=$orID");
	$_SESSION['message'] = "<br>"."<h2>Orador eliminado!</h2>"."<br>"; 
	header('location: oradoresAdmin.php');
	exit();
}
