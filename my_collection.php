<?php
include 'admin/db_connect.php';
function checkOrderItemExists($order_item_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM service_requests WHERE order_item_id = ?");
    $stmt->bind_param("i", $order_item_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['COUNT(*)'] > 0) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
}
?>

<div class="container my-5">

    <!-- Delivered Orders Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Delivered Orders</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Delivery Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("
                        SELECT o.id AS order_id, oi.product_id, oi.qty, oi.price, o.date_created,oi.size_id,oi.id as oiid, o.status, p.name AS product_name 
                        FROM orders o 
                        JOIN order_items oi ON o.id = oi.order_id
                        JOIN products p ON oi.product_id = p.id
                        WHERE o.user_id = '{$_SESSION['login_id']}' 
                        AND o.status = 3 
                        ORDER BY unix_timestamp(o.date_created)");

                    while ($row = $query->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row['order_id'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <?php $size = $conn->query("SELECT * FROM sizes where id = {$row['size_id']}");
                            $size = $size->num_rows > 0 ? $size->fetch_array()['size'] : 'N/A'; ?>
                            <td><?php echo $size ?></td>
                            <td><?php echo date('Y-m-d', strtotime($row['date_created'])) ?></td>
                            <td>
                                <!-- Warranty Claim Button -->
                                <button <?php echo checkOrderItemExists($row['oiid']) ?  "disabled" :  '' ?> class="btn btn-primary btn-sm" > <a class="text-dark" href="index.php?page=make_request&id=<?php echo $row['oiid'] ?>&r=w&p=<?php echo $row['product_id'] ?>" >Warranty Claim</a></button>

                                <!-- Repair Request Button -->
                                <button <?php echo checkOrderItemExists($row['oiid']) ?  "disabled" :  '' ?> class=" btn btn-danger btn-sm"> <a class="text-dark" href="index.php?page=make_request&id=<?php echo $row['oiid'] ?>&r=r&p=<?php echo $row['product_id'] ?>" +>Repair Request</a>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
