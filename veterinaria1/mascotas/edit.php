<?php
include("db.php");
$nombre = '';
$apellido = '';
$sexo = '';
$correo = '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM mascota WHERE dni_mascota= $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['nombre_mascota'];
    $apellido = $row['especie_mascota'];
    $sexo = $row['genero_mascota'];
    $correo = $row['dni_propietario'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre_mascota'];
  $apellido = $_POST['especie_mascota'];
  $sexo = $_POST['genero_mascota'];
  $correo = $_POST['dni_propietario'];

  $query = "UPDATE dueño set nombre_mascota = '$nombre', especie_mascota = '$apellido', genero_mascota = '$sexo', dni_propietario = '$correo' WHERE dni_mascota=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: dueño.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <p>
              <input type="text" name="nombre_mascota" class="form-control" placeholder="Nombre" autofocus>
            </p>
            <p>
              <input type="text" name="especie_mascota" class="form-control" placeholder="Especie" autofocus>
            </p>
            <p>
              <input type="text" name="genero_mascota" class="form-control" placeholder="sexo" autofocus>
            </p>
            <p>
              <input type="text" name="dni_mascota" class="form-control" placeholder="id_propietario" autofocus>
            </p>
          </div>
          <button class="btn-success" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>