<?php 

include("db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    $nombre=$_POST['nombre_veterinario'];  //guardo cada dato ingredado
    $apellido=$_POST['apellido_veterinario'];
    $sexo=$_POST['sexo_veterinario']; 
    $especialidad=$_POST['especialidad_veterinario'];

    $query="INSERT INTO veterinario(nombre_veterinario, apellido_veterinario, genero_veterinario, especialidad_veterinario) VALUES ('$nombre', '$apellido', '$sexo', '$especialidad');"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: veterinario.php");
}

?>