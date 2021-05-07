<?php 

include("db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    $nombre=$_POST['nombre_dueño'];  //guardo cada dato ingredado
    $apellido=$_POST['apellido_dueño'];
    $sexo=$_POST['sexo_dueño']; 
    $correo=$_POST['email_dueño'];

    $query="INSERT INTO dueño(nombre_dueño, apellido_dueño, sexo_dueño, correo_dueño) VALUES ('$nombre', '$apellido', '$sexo', '$correo');"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: dueño.php");
}

?>