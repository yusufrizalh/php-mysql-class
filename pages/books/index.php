<?php
include("../../layouts/header.php");

if (!isset($_SESSION['name'])) {
    header("location: ../auth/login.php");
    exit();
}
?>

<!-- get all books -->
<div class="container mt-5 py-5">
    <?php
    require_once "../../config/connection.php";
    $sql = "SELECT b.isbn AS isbn, b.title AS title, b.price AS price, CONCAT(a.first_name, ' ', a.last_name) AS author
            FROM books AS b JOIN authors AS a ON b.fk_author_id = a.id ORDER BY b.id DESC;";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3>All Books</h3>
                </div>
                <div class="col-md-4">
                    <a href="./create.php" class="btn btn-md btn-primary">New Book</a>
                    &nbsp;
                    <a href="./exportpdf.php" target="_blank" class="btn btn-md btn-primary">Export PDF</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- search form -->
                    <?php
                    include("./search-form.php");
                    ?>
                </div>
            </div>
            <hr>

            <!-- display results with table -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-dark text-center">
                        <th>NO.</th>
                        <th>Book ISBN</th>
                        <th>Book Title</th>
                        <th>Book Price</th>
                        <th>Book Author</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td>
                                <a href="./show_isbn.php?isbn=<?php echo $row['isbn']; ?>" class="text-primary" style="text-decoration: none;">
                                    <?php echo $row['isbn']; ?>
                                </a>
                            </td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo "USD " . $row['price']; ?></td>
                            <td class="text-center">
                                <a href="./show_author.php?author=<?php echo $row['author']; ?>" class="text-primary text-decoration-none">
                                    <?php echo $row['author']; ?>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3>All Books</h3>
                </div>
                <div class="col-md-4">
                    <a href="./create.php" class="btn btn-md btn-primary">New Book</a>
                    &nbsp;
                    <a href="./exportpdf.php" target="_blank" class="btn btn-md btn-primary">Export PDF</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- search form -->
                    <?php
                    include("./search-form.php");
                    ?>
                </div>
            </div>
            <hr>
            <div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>No Books Found...</th>
                    </thead>
                </table>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
include("../../layouts/footer.php");
?>