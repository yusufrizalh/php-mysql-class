<?php
include("../../layouts/header.php");
?>

<!-- get book by author -->
<?php
require_once "../../config/connection.php";

if (isset($_GET['author']) && !empty(trim($_GET['author']))) {
    $author = $_GET['author'];
    $sql = "SELECT CONCAT(a.first_name, ' ', a.last_name) AS author, b.isbn AS isbn, b.title AS title, b.price AS price
            FROM books AS b INNER JOIN authors AS a ON b.fk_author_id = a.id
            WHERE CONCAT(a.first_name, ' ', a.last_name) LIKE '$author' ORDER BY b.id DESC;";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {

?>
        <div class="container mt-5 py-5">
            <div class="row">
                <div class="col-md-6">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Author: <?php echo $row['author']; ?></h4>
                            </div>
                            <div class="card-body">
                                <p>ISBN: <?php echo $row['isbn']; ?></p>
                                <p>Title: <?php echo $row['title']; ?></p>
                                <p>Price: <?php echo $row['price']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<?php
include("../../layouts/footer.php");
?>