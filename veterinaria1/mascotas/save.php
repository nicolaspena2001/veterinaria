<?php 

include("db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    $nombre=$_POST['nombre_mascota'];  //guardo cada dato ingredado
    $especie=$_POST['especie_mascota'];
    $sexo=$_POST['genero_mascota']; 
    $propietario=$_POST['dni_propietario'];

    $query="INSERT INTO mascota(nombre_mascota, especie_mascota, dni_propietario, genero_mascota) VALUES ('$nombre', '$especie', '$propietario', '$sexo');"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: mascotas.php");
}

?>