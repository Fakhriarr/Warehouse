<?php
include 'function.php';

$connect = $database->connect();
$dataOperation = new DataOperation($connect);

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Menggunakan polimorfisme
    switch ($action) {
        case 'add':
            $operation = new AddData($connect);
            $success = $operation->execute($_POST);
            break;

        case 'edit':
            $operation = new EditData($connect);
            $success = $operation->execute($_POST);
            break;
    }

    if ($success) {
        header("location: index.php");
    } else {
        echo $success;
    }
}

if (isset($_GET['delete'])) {
    // Menggunakan polimorfisme
    $operation = new DeleteData($connect);
    $success = $operation->execute($_GET);

    if ($success) {
        header("location: index.php");
    } else {
        echo $success;
    }
}


?>
