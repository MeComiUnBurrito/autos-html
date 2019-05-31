<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $Nombre = mysqli_real_escape_string($db,$_POST['username']);
      $Contrasena = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT ID FROM usuarios WHERE Usuario = '$Nombre' and Contrasena = '$Contrasena'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      echo $sql;
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("Nombre");
         $_SESSION['login_user'] = $Nombre;
         
         header("location: welcome.php");
      }else {
         $error = "El Usuario o la Contraseña es invalida";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:500px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Inicio de Sesion</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Usuario  :   </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Iniciar "/><br />
               </form>
               
               <div style = "font-size:12px; color:#cc0000; margin-top:10px">
                  
                     
                  </div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>