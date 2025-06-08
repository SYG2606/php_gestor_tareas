<?php
include("db.php");
//session_start();

if (isset($_POST['guardar_tarea'])) {
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO task(title, descripcion) VALUES ('$title', '$descripcion')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error al guardar tarea");
    }

    $_SESSION['message'] = 'Tarea guardada exitosamente';
    $_SESSION['message_type'] = 'success'; // 'success', 'danger', etc.
    
    header("Location: index.php");
    exit();
}
?>
