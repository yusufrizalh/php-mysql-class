<?php

require_once "../../config/connection.php";

if (isset($_POST['save'])) {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $fk_author_id = $_POST['fk_author_id'];

    $sql = "INSERT INTO books(isbn,title,price,fk_author_id) VALUES ('$isbn', '$title', '$price', '$fk_author_id')";

    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('New book was stored');</script>";
        echo "<script type='text/javascript'>location.href='http://localhost/simpleweb/project1/pages/books/index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('New book failed to stored');</script>";
    }

    $con->close();
}
