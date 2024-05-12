<?php
include("../../layouts/header.php");
?>

<!-- get book by isbn -->
<?php
require_once "../../config/connection.php";

if (isset($_GET['isbn']) && !empty(trim($_GET['isbn']))) {
    $isbn = $_GET['isbn'];
    $sql = "SELECT b.isbn AS isbn, b.title AS title, b.price AS price, CONCAT(a.first_name, ' ', a.last_name) AS author
            FROM books AS b INNER JOIN authors AS a ON b.fk_author_id = a.id WHERE b.isbn = '$isbn';";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container mt-5 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>ISBN: <?php echo $row['isbn']; ?></h4>
                            </div>
                            <div class="card-body">
                                <p>Title: <?php echo $row['title']; ?></p>
                                <p>Price: <?php echo $row['price']; ?></p>
                                <p>Author: <?php echo $row['author']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="./edit.php?isbn=<?php echo $row['isbn']; ?>" class="btn btn-md btn-warning">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5" id="deleteModalLabel">Delete Course</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Are you sure to delete this book?</h4>
                                                <p>
                                                    <strong><?php echo $row['title']; ?></strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="./delete.php?isbn=<?php echo $row['isbn']; ?>" method="post">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>

<?php
include("../../layouts/footer.php");
?>