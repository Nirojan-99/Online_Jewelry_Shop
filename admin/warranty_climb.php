<?php
include 'db_connect.php';

$query = "SELECT s.id, p.name, p.warranty, u.firstname, s.updated_on, s.order_item_id, p.id AS pid,s.message
          FROM service_requests s
          JOIN products p ON s.product_id = p.id
          JOIN users u ON s.user_id = u.id 
          WHERE s.request_type = 'w' AND s.status = 'pending'";
$result = $conn->query($query);

if (!$result) {
    die("Error fetching data: " . $conn->error);
}
?>

<div class="container mb-5">

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product Name</th>
                        <th>Warranty Period</th>
                        <th>User</th>
                        <th>Purchase Date</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = $result->fetch_assoc()) {
                        $request_id = $row['id'];
                        $product_name = $row['name'];
                        $warranty_period = $row['warranty'];
                        $username = $row['firstname'];
                        $request_date = $row['updated_on'];
                        $order_item_id = $row['order_item_id'];

                        $query1 = "SELECT date_created FROM order_items WHERE id = ?";
                        $stmt = $conn->prepare($query1);
                        $stmt->bind_param("i", $order_item_id);
                        $stmt->execute();
                        $purchaseResult = $stmt->get_result();

                        if ($purchaseResult->num_rows > 0) {
                            $row1 = $purchaseResult->fetch_assoc();
                            $purchase_date = $row1['date_created'];
                        } else {
                            $purchase_date = null;
                        }
                        $stmt->close();
                    ?>

                        <tr>
                            <td>
                                <a href="#" class="fw-bold" style="color: blue;" data-bs-toggle="modal" data-bs-target="#viewImagesModal<?php echo $request_id; ?>">
                                    <?php echo $request_id; ?>
                                </a>
                            </td>
                            <td><a class="fw-semibold" style="color: blue;" href="index.php?page=view_product&id=<?php echo $row['pid']; ?>"><?php echo $product_name; ?></a></td>
                            <td><?php echo $warranty_period; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $purchase_date ? $purchase_date : 'N/A'; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <button class="btn btn-primary fw-semibold btn-sm" onclick="handleStatus(<?php echo $request_id; ?>,'accepted')">Accept</button>
                                <button class="btn btn-danger fw-semibold btn-sm" onclick="handleStatus(<?php echo $request_id; ?>,'rejected')">Deny</button>
                            </td>
                        </tr>

                        <!-- Modal for images -->
                        <div class="modal fade" id="viewImagesModal<?php echo $request_id; ?>" tabindex="-1" aria-labelledby="viewImagesModalLabel<?php echo $request_id; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewImagesModalLabel<?php echo $request_id; ?>">Damaged Product Images - Request <?php echo $request_id; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row gap-3 align-items-center justify-content-center">
                                            <div class="col-5 mb-3">
                                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="Damaged Product Image 1">
                                            </div>
                                            <div class="col-5 mb-3">
                                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="Damaged Product Image 2">
                                            </div>
                                            <div class="col-5 mb-3">
                                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="Damaged Product Image 3">
                                            </div>
                                            <div class="col-5 mb-3">
                                                <img src="https://via.placeholder.com/300" class="img-fluid" alt="Damaged Product Image 4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function handleStatus(id, status) {
        start_load()

        $.ajax({
            url: 'ajax.php?action=update_user_req',
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