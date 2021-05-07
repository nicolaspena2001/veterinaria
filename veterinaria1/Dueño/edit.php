<?php
include("db.php");
$nombre = '';
$apellido = '';
$sexo = '';
$correo = '';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM dueño WHERE id_dueño= $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['nombre_dueño'];
    $apellido = $row['apellido_dueño'];
    $sexo = $row['sexo_dueño'];
    $correo = $row['correo_dueño'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre_dueño'];
  $apellido = $_POST['apellido_dueño'];
  $sexo = $_POST['sexo_dueño'];
  $correo = $_POST['correo_dueño'];

  $query = "UPDATE dueño set nombre_dueño = '$nombre', apellido_dueño = '$apellido', sexo_dueño = '$sexo', correo_dueño = '$correo' WHERE id_dueño=$id";
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
              <input type="text" name="nombre_dueño" class="form-control" placeholder="Nombre" autofocus>
            </p>
            <p>
              <input type="text" name="apellido_dueño" class="form-control" placeholder="Apellido" autofocus>
            </p>
            <p>
              <input type="text" name="sexo_dueño" class="form-control" placeholder="sexo" autofocus>
            </p>
            <p>
              <input type="text" name="correo_dueño" class="form-control" placeholder="E-Mail" autofocus>
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