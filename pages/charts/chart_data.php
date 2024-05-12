<?php
require_once "../../config/connection.php";

$sql = "SELECT CONCAT(a.first_name, ' ', a.last_name) AS author, COUNT(a.id) AS books_by_author FROM books AS b JOIN authors AS a ON b.fk_author_id = a.id GROUP BY a.id";

$result = $con->query($sql);
$jsonArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['author'];
        $jsonArrayItem['value'] = $row['books_by_author'];
        array_push($jsonArray, $jsonArrayItem);
    }
}

$con->close();

header('Content-Type: application/json');
echo json_encode($jsonArray);
