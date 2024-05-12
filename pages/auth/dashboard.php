<?php
include("../../layouts/header.php");

// session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}
?>

<div class="container mt-5 py-5">
    <h3>Dashboard &middot; <strong><?php echo $_SESSION['name'] ?></strong></h3>
    <hr>

    <div class="row">
        <?php
        require_once "../../config/connection.php";
        $sql_users_count = "SELECT COUNT(*) AS users_count FROM users;";
        $result_users_count = $con->query($sql_users_count);

        if ($result_users_count->num_rows > 0) {
        ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <h6>Total Users</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        while ($row_users_count = $result_users_count->fetch_assoc()) {
                            echo "<h1>" . $row_users_count['users_count'] . " Users</h1>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        require_once "../../config/connection.php";
        $sql_books_count = "SELECT COUNT(*) AS books_count FROM books;";
        $result_books_count = $con->query($sql_books_count);

        if ($result_books_count->num_rows > 0) {
        ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header bg-success text-white">
                        <h6>Total Books</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        while ($row_books_count = $result_books_count->fetch_assoc()) {
                            echo "<h1>" . $row_books_count['books_count'] . " Books</h1>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        require_once "../../config/connection.php";
        $sql_authors_count = "SELECT COUNT(*) AS authors_count FROM authors;";
        $result_authors_count = $con->query($sql_authors_count);

        if ($result_authors_count->num_rows > 0) {
        ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">
                        <h6>Total Authors</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        while ($row_authors_count = $result_authors_count->fetch_assoc()) {
                            echo "<h1>" . $row_authors_count['authors_count'] . " Authors</h1>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


</div>

<?php
include("../../layouts/footer.php");
?>