<?php include('db.php'); ?>

<?php include('includes/header.php'); ?>
<main class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--mensaje de alerta con bootstrap-->
            <?php session_unset();
            } ?>
            <!--cierra el mesaje de alerta al refrescar la página-->

            <div class="card card-body">
                <h2 class="text-center">Ingresar Datos</h2>
                <form action="save.php" method="POST">

                    <div class="form-group">

                        <p>
                            <input type="text" name="nombre_dueño" class="form-control" placeholder="Nombre" autofocus>
                        </p>
                        <p>
                            <input type="text" name="apellido_dueño" class="form-control" placeholder="Apellido" autofocus>
                        </p>
                        <p>
                            <input type="text" name="sexo_dueño" class="form-control" placeholder="Sexo" autofocus>
                        </p>
                        <p>
                            <input type="email" name="email_dueño" class="form-control" placeholder="E-Mail" autofocus>
                        </p>

                    </div>
                    <input type="submit" class="btn btn-success btn block" name='save' value="Enviar">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <h2 class="text-center">Datos de Dueños</h2>
            <table class="table table-border">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $query = "SELECT *  FROM dueño";
                    $result_usuario = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result_usuario)) { ?>
                        <!--recorro mi tabla usuario-->
                        <tr>
                            <td>
                                <?php echo $row['id_dueño']; ?>
                            </td>
                            <td>
                                <?php echo $row['nombre_dueño']; ?>
                            </td>
                            <td>
                                <?php echo $row['apellido_dueño']; ?>
                            </td>
                            <td>
                                <?php echo $row['sexo_dueño']; ?>
                            </td>
                            <td>
                                <?php echo $row['correo_dueño']; ?>
                            </td>
                            <td><a href="edit.php?id=<?php echo $row['id_dueño'] ?>">Editar</a></td>
                            <td><a href="delete.php?id=<?php echo $row['id_dueño'] ?>">Eliminar</a></td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</main>

<?php include('includes/footer.php'); ?>