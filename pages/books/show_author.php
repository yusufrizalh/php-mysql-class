<?php
include("../../layouts/header.php");

if (!isset($_SESSION['name'])) {
    header("location: ../auth/login.php");
    exit();
}
?>

<!-- get book by author -->
<?php
require_once "../../config/connection.php";

if (isset($_GET['author']) && !empty(trim($_GET['author']))) {
    $author = $_GET['author'];
    $sql = "SELECT CONCAT(a.first_name, ' ', a.last_name) AS author, b.isbn AS isbn, b.title AS title, b.price AS price, b.id AS id
            FROM books AS b INNER JOIN authors AS a ON b.fk_author_id = a.id
            WHERE CONCAT(a.first_name, ' ', a.last_name) LIKE '$author' ORDER BY b.id DESC;";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $rowaut = $result->fetch_all();

?>
        <div class="container mt-5 py-5">
            <div class="row mb-3">
                <h3>Author: <b><?php echo $rowaut[0][0]; ?></b></h3>
            </div>
            <div class="row">
                <?php
                foreach ($rowaut as $row) {
                ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h4>Book ID: <?php echo $row[4]; ?></h4>
                            </div>
                            <div class="card-body">
                                <p>ISBN: <?php echo $row[1]; ?></p>
                                <p>Title: <?php echo $row[2]; ?></p>
                                <p>Price: <?php echo $row[3]; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container mt-5 py-5 px-3">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header bg-secondary text-white">
                        <h4>Books Not Found</h4>
                    </div>
                </div>
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