<?php
session_start();
include("db.php");

// Paso 1: Obtener la tarea para editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $descripcion = $row['descripcion'];
    }
}

// Paso 2: Guardar los cambios si se envió el formulario
if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $nuevoTitulo = $_POST['title'];
    $nuevaDescripcion = $_POST['descripcion'];

    $query = "UPDATE task SET title = '$nuevoTitulo', descripcion = '$nuevaDescripcion' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea actualizada correctamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
    exit();
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Título">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción"><?php echo $descripcion; ?></textarea>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-block w-100" name="actualizar">
                        Actualizar Tarea
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
