<?php

require_once "../../config/connection.php";

if (isset($_GET['isbn']) && !empty(trim($_GET['isbn']))) {
    $isbn = $_GET['isbn'];
    $sql = "DELETE FROM books WHERE isbn = '$isbn'";

    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Book was deleted!');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/simpleweb/project1/pages/books/index.php';</script>";
    } else {
        echo "Error: " . $sql . " - " . $con->error;
    }

    $con->close();
}