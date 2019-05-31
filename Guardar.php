<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'inventario_autos');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE)or die("Problema al conectar");
   mysqli_select_db($db,DB_DATABASE)or die("problema al conectar base de datos");

   
   	
	



   $Nombres=$_POST['Nombre'];
   $Apellidos=$_POST['Apellidos'];
   $CURP=$_POST['CURP'];
   $Modelo_Auto=$_POST['Modelo'];
   $Tipo_Auto=$_POST['Tipo'];
   $Serie_Placa=$_POST['Placa'];
   $Num_Serie=$_POST['Serie'];

   $sql="INSERT INTO autos_ingresados VALUES ('$Nombres',
												'$Apellidos',
												'$CURP',
												'$Modelo_Auto',
												'$Tipo_Auto',
												'$Serie_Placa',
												'$Num_Serie')";
    $ejecutar=mysqli_query($db,$sql);

    if(!$ejecutar){
    	echo"Se Encontro Un Error";

    }else{

    	echo"Formulario Guardado <br><a href='Formulario.html'>Volver</a>";
    }




?>