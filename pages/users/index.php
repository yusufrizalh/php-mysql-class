<?php
include("../../layouts/header.php");

// session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}
?>

<div class="container mt-5 py-5">
    <?php
    require_once "../../config/connection.php";
    $sql = "SELECT * FROM users ORDER BY id DESC;";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="row">
            <div class="col-md-4">
                <h3>All Users</h3>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-dark text-center">
                    <th>NO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tbody>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php if ($row["active"] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            } ?></td>
                    </tr>
                </tbody>
            <?php
                $no++;
            }
            ?>

        </table>
    <?php
    }
    ?>

</div>

<?php
include("../../layouts/footer.php");
?>