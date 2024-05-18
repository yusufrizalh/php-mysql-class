<?php
include("../../layouts/header.php");

require_once "../../config/connection.php";

// session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container mt-5 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4><strong>Profile: <?php echo $row['name']; ?></strong></h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                                            <label for="name" class="form-label">Username</label>
                                            <input type="text" name="name" class="form-control" autocomplete="off" readonly value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" autocomplete="off" readonly value="<?php echo $row['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Status</label>
                                            <input type="text" name="active" class="form-control" autocomplete="off" readonly value="<?php echo $row['active']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Description</label>
                                            <textarea name="description" class="form-control" readonly><?php echo $row['description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Active since</label>
                                            <input type="text" name="created_at" class="form-control" autocomplete="off" readonly value="<?php echo $row['created_at']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" autocomplete="off" readonly value="<?php echo $row['password']; ?>">
                                        </div>
                                        <!-- <div class="mt-3">
                                            <button type="submit" class="btn btn-md btn-primary" name="btn-update">
                                                Update
                                            </button>
                                        </div> -->
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