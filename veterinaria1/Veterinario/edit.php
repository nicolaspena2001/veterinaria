<?php
include("db.php");
$nombre = '';
$apellido = '';
$sexo = '';
$especialidad = '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM veterinario WHERE dni_veterinario= $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['nombre_veterinario'];
    $apellido = $row['apellido_veterinario'];
    $sexo = $row['genero_veterinario'];
    $especialidad = $row['especialidad_veterinario'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre_veterinario'];
  $apellido = $_POST['apellido_veterinario'];
  $sexo = $_POST['sexo_veterinario'];
  $especialidad = $_POST['especialidad_veterinario'];

  $query = "UPDATE veterinario set nombre_veterinario = '$nombre', apellido_veterinario = '$apellido', genero_veterinario = '$sexo', especialidad_veterinario = '$especialidad' WHERE id_veterinario=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se realizaron los cambios';
  $_SESSION['message_type'] = 'warning';
  header('Location: veterinario.php');
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
              <input type="text" name="nombre_veterinario" class="form-control" placeholder="Nombre" autofocus>
            </p>
            <p>
              <input type="text" name="apellido_veterinario" class="form-control" placeholder="Apellido" autofocus>
            </p>
            <p>
              <input type="text" name="sexo_veterinario" class="form-control" placeholder="Sexo" autofocus>
            </p>
            <p>
              <textarea name="especialidad_veterinario" rows="3" class="form-control" placeholder="Especialida"></textarea>
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