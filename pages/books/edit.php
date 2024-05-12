<?php
include("../../layouts/header.php");

require_once "../../config/connection.php";

if (isset($_GET['isbn']) && !empty(trim($_GET['isbn']))) {
    $isbn = $_GET['isbn'];
    $sql = "SELECT b.id AS id, b.isbn as isbn, b.title AS title, b.price AS price, CONCAT(a.first_name, ' ', a.last_name) AS author
            FROM books AS b INNER JOIN authors AS a ON a.id = b.fk_author_id WHERE b.isbn = '$isbn';";

    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container mt-5 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4><strong>Edit Book ISBN: <?php echo $row['isbn']; ?></strong></h4>
                                </div>
                                <div class="card-body">
                                    <form action="./update.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                                            <input type="text" name="isbn" class="form-control" autocomplete="off" required disabled value="<?php echo $row['isbn']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="title" class="form-control" autocomplete="off" required value="<?php echo $row['title']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="price" class="form-control" autocomplete="off" required value="<?php echo $row['price']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <select name="fk_author_id" class="form-control" required>
                                                <?php
                                                require_once "../../config/connection.php";
                                                $isbn = $_GET['isbn'];

                                                $sqlaut = "SELECT a.id AS id, CONCAT(a.first_name, ' ', a.last_name) AS author, a.email AS email, a.address AS address FROM authors AS a";
                                                $sql = "SELECT b.id AS id, b.isbn AS isbn, b.title AS title, b.price AS price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.fk_author_id AS fk_author_id
                                                        FROM books AS b INNER JOIN authors AS a ON b.fk_author_id = a.id WHERE b.isbn = '$isbn';";

                                                $resultaut = $con->query($sqlaut);
                                                $result = $con->query($sql);

                                                if (($result->num_rows > 0) && ($resultaut->num_rows > 0)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row['id'] == $_POST['fk_author_id']) {
                                                            echo "<option value=" . $row['id'] . "selected>" . $row['author'] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row['id'] . ">" . $row['author'] . "</option>";
                                                        }
                                                    }
                                                    while ($rowaut = $resultaut->fetch_assoc()) {
                                                        echo "<option value=" . $rowaut['id'] . ">" . $rowaut['author'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-md btn-primary" name="btn-update">
                                                Update
                                            </button>
                                        </div>
                                    </form>
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