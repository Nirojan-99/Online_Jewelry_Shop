<?php include 'admin/db_connect.php' ?>
<div class="container my-5">

    <!-- Customization Requests Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Customization Requests</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>Customization Details</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = $conn->query("SELECT * FROM customization where user_id = '{$_SESSION['login_id']}' order by unix_timestamp(date_created)");
                    while ($row = $query->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <?php $qry = $conn->query("SELECT p.item_code as item_code ,name as name FROM products p  where p.id = '{$row['product_id']}' ")->fetch_array(); ?>
                            <td><a href="./index.php?page=view_product&c=<?php echo $qry['item_code'] ?>"><?php echo $qry['name'] ?></a></td>
                            <td>
                                <ul>
                                    <li><?php echo $row['message'] ?></li>
                                </ul>
                            </td>
                            <td>
                                <span class="badge bg-success"><?php echo $row['status'] ?></span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Warranty Claims Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Warranty Claims</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Claim ID</th>
                        <th>Product</th>
                        <th>Warranty Period</th>
                        <th>Purchase Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM service_requests where user_id = '{$_SESSION['login_id']}' AND request_type = 'w' order by unix_timestamp(updated_on)");


                    while ($row = $query->fetch_assoc()):
                        $claim_id = $row['id'];
                        $qry = $conn->query("SELECT p.item_code as item_code,p.warranty as warranty ,name as name FROM products p  where p.id = '{$row['product_id']}' ")->fetch_array();
                        $product_name = $qry['name'];
                        $warranty_period = $qry['warranty'];
                        $claim_date = $row['updated_on'];
                        $status = $row['status'];

                        $purchase_query = $conn->query("SELECT date_created FROM order_items WHERE id = '{$row['order_item_id']}'")->fetch_assoc();
                        $purchase_date = $purchase_query ? $purchase_query['date_created'] : 'N/A';
                    ?>
                        <tr>
                            <td><?php echo $claim_id; ?></td>
                            <td><a href="./index.php?page=view_product&c=<?php echo $qry['item_code'] ?>"><?php echo $product_name ?></a></td>
                            <td><?php echo $warranty_period; ?></td>
                            <td><?php echo $purchase_date; ?></td>
                            <td>
                                <span class="badge bg-<?php echo $status == 'pending' ? 'warning' : ($status == 'accepted' ? 'success' : 'danger'); ?>">
                                    <?php echo ucfirst($status); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Repair Requests Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Repair Requests</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>Damage Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $repair_query = $conn->query("SELECT sr.id AS request_id, p.name AS product_name, u.firstname AS user_name, 
                        sr.message AS damage_description, sr.status AS repair_status
                        FROM service_requests sr
                        JOIN products p ON sr.product_id = p.id
                        JOIN users u ON sr.user_id = u.id
                        WHERE sr.request_type = 'r' AND sr.status != 'completed' AND sr.user_id = '{$_SESSION['login_id']}'
                        ORDER BY unix_timestamp(sr.updated_on) DESC");

                    while ($row = $repair_query->fetch_assoc()):
                        $request_id = $row['request_id'];
                        $product_name = $row['product_name'];
                        $damage_description = $row['damage_description'];
                        $repair_status = $row['repair_status'];
                    ?>
                        <tr>
                            <td><?php echo $request_id; ?></td>
                            <td><a href="./index.php?page=view_product&c=<?php echo $qry['item_code'] ?>"><?php echo $product_name ?></a></td>
                            <td><?php echo $damage_description; ?></td>
                            <td>
                                <span class="badge bg-<?php echo $repair_status == 'pending' ? 'warning' : ($repair_status == 'accepted' ? 'success' : 'danger'); ?>">
                                    <?php echo ucfirst($repair_status); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>