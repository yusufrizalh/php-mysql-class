<?php
include("../../layouts/header.php");
?>

<div class="container mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4><strong>Create New Book</strong></h4>
                    </div>
                    <div class="card-body">
                        <form action="./store.php" method="post">
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN Number</label>
                                <input type="number" name="isbn" class="form-control" autocomplete="off" autofocus placeholder="Enter isbn number" required>
                            </div>
                            <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                                <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter book title" required>
                            </div>
                            <div class="mb-3">
                            <label for="price" class="form-label">Book Price</label>
                                <input type="text" name="price" class="form-control" autocomplete="off" placeholder="Enter book price" required>
                            </div>
                            <div class="mb-3">
                            <label for="fk_author_id" class="form-label">Book Author</label>
                                <?php
                                require_once "../../config/connection.php";
                                $sql = "SELECT * FROM authors ORDER BY id ASC";
                                $result = $con->query($sql);
                                ?>
                                <select name="fk_author_id" class="form-control" required>
                                    <option disabled selected>Choose One!</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['first_name'] . " " . $row['last_name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-md btn-primary" name="save">
                                    Save
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
include("../../layouts/footer.php");
?>