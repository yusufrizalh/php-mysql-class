<?php

require_once "../../config/connection.php";

if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    // $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $fk_author_id = $_POST['fk_author_id'];

    $sql = "UPDATE books SET title = '$title', price = '$price', fk_author_id = '$fk_author_id' WHERE id = '" . $id . "'";

    if ($con->query($sql) == TRUE) {
        // echo "Book was updated";
        echo "<script type='text/javascript'>alert('Book was updated');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/simpleweb/project1/pages/books/index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Book failed to updated');</script>";
    }

    $con->close();
}
