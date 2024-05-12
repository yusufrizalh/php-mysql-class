<?php
include("../../layouts/header.php");
?>

<!-- get all courses -->
<div class="container mt-5 py-5">
    <?php
    require_once "../../config/connection.php";

    $sql = "SELECT a.id AS id, CONCAT(a.first_name, ' ', a.last_name) AS author_name, a.email AS email, a.address AS address, a.created_at AS active FROM authors AS a ORDER BY a.id DESC";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3>All Authors</h3>
                </div>
            </div>
            <hr>
            <div class="col-md-4">
                <!-- display results with list -->
                <div class="list-group">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <a href="./show_author.php?author=<?php echo $row['author_name']; ?>" class="text-primary text-decoration-none">
                                <?php echo $row['author_name']; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
include("../../layouts/footer.php");
?>