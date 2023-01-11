<?php
$adminUser = 'HAL';
$adminPwd = '2001';
$adminType = '1';

$userAsk = $_POST['usrname'];
$passAsk = $_POST['passwd'];


if (($userAsk == $adminUser) && ( 
$passAsk == $adminPwd))
    { session_start();
    $_SESSION['usrname'] = $adminUser;
    $_SESSION['passwd'] = $adminPwd;
    
    header("Location: ./admin.php");
    exit();
} else {
    
    // $my_query=mysqli_connect("localhost","id19634033_root","LoreConferenciaDB1*","id19634033_cac_2022");
    $my_query=mysqli_connect("localhost","root","","cac_2022");
    // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
                
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>

    #btn_volver {
      position: relative;
      top: 400px;
      margin: 25%;           
    } 
   </style> 
 
 
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">  
   <link rel="stylesheet" type="text/css" href="../css/registro.css">  
   <link rel="stylesheet" type="text/css" href="../css/admin.css">
   <link rel="stylesheet" type="text/css" href="../css/alerta.css">
    <link rel="stylesheet" type="text/css" href="../css/regData.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">



   </head>
<body>
     
<?php
// CONSULTA A LA BASE

        $answer = $my_query->query("SELECT * FROM usuario WHERE username = '$userAsk' AND pwd = '$passAsk'");

            if($answer->num_rows == 0) {
                     ?>
                   <div class = "alerta" id="alerta-user" >
                    <!-- <span class="closebtn" onclick = noAlertaUser()>&times;</span> -->
                    <span class="closebtn" onclick = noAlertaUser()> &times;</span>
                    <div class="mensaje">
                      <img src="../Images/warning2.png" width= "15%" alt="alerta-user-no-valido. Warning icons created by Freepik - Flaticon">
                    <h2> Usuario o contraseña incorrectos</h2>
                   
                    </div>
                    
                     
                  </div>
                     <script language="javascript">
                        alertaUser()
                        function noAlertaUser() { 
                            document.getElementById("alerta-user").style.display = 'none';
                            window.location.href='../registro.html#login';
                        } 
                        function alertaUser() {
                            document.getElementById("alerta-user").style.display = 'block';
                    }
                    </script>


                <?php

                } else {
                  ?>
                    <div class = "alerta" id="alerta-loginOK" >
                    <span class="closebtn" onclick = noAlertaLogin()> &times;</span>
                    <div class="mensaje">
                      <img src="../Images/1632603.png" width= "15%" alt="login-exitoso. Flaticon">
                    <h2> Login exitoso. Cerrá este cuadro para ingresar</h2>
                   
                    </div>
                    <script language="javascript">
                        alertaLogin()
                        function noAlertaLogin() { 
                            document.getElementById("alerta-loginOK").style.display = 'none';
                            window.location.href='../index.html';
                        } 
                        function alertaLogin() {
                            document.getElementById("alerta-loginOK").style.display = 'block';
                    }
                    </script>


                    <?php
                    // header("Location: ../index.html");
                    // exit();
                }
                $my_query->close();
        }


// session_start();
// $_SESSION['username'] = $_POST['usrname'];
// $_SESSION['passwd'] = $_POST['passwd'];


?>

    
</body>
</html>
