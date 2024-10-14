<?php
include 'db_connect.php';

if (!isset($_SESSION['login_id'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit;
}
?>
<div class="container mb-5">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Requested Customization</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = $conn->query("SELECT * FROM customization WHERE status = 'pending' ORDER BY unix_timestamp(date_created) DESC");
                    while ($row = $query->fetch_assoc()):
                    ?>
                        <tr>
                            <?php
                            $qry = $conn->query("SELECT p.item_code as item_code, name as name FROM products p WHERE p.id = '{$row['product_id']}'")->fetch_array();
                            $uqry = $conn->query("SELECT u.firstname as firstname FROM users u WHERE u.id = '{$row['user_id']}'")->fetch_array();
                            ?>
                            <td><?php echo $row['id'] ?></td>
                            <td><a href="./index.php?page=view_product&id=<?php echo $row['product_id'] ?>"><?php echo $qry['name'] ?></a></td>
                            <td><?php echo $uqry['firstname'] ?></td>
                            <td>
                                <ul>
                                    <li><?php echo $row['message'] ?></li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-primary fw-semibold btn-sm" onclick="handleStatus(<?php echo $row['id'] ?>, 'accepted')">Accept</button>
                                <button class="btn btn-danger fw-semibold btn-sm" onclick="handleStatus(<?php echo $row['id'] ?>, 'denied')">Deny</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function handleStatus(id, status) {
        start_load()

        $.ajax({
            url: 'ajax.php?action=update_custom_req',
            method: 'POST',
            data: {
                id: id,
                status: status
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Customization request updated successfully", "success")
                    end_load()
                    load_cart()
                }
            }
        })
    }
</script>