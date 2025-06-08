<?php
session_start();
include("db.php");
include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <!-- Formulario para agregar tarea -->
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset(); // limpia todas las variables de sesión ?>
            <?php } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Título de la Tarea" autofocus required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la Tarea" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success w-100" name="guardar_tarea" value="Guardar Tarea">
                </form>
            </div>
        </div>

        <!-- Tabla de tareas -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task ORDER BY created_at DESC";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['descripcion'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?= $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
