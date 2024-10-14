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
<div class="container" id="warrantyModal">
    <div class="modal-body">
        <form id="requestForm" enctype="multipart/form-data" method="POST">
            <input type="hidden" id="order_item_id" name="order_item_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="hidden" id="request_type" name="request_type" value="<?php echo isset($_GET['r']) ? $_GET['r'] : ''; ?>">
            <input type="hidden" id="product_id" name="product_id" value="<?php echo isset($_GET['p']) ? $_GET['p'] : ''; ?>">

            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Upload Images:</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                <small class="text-muted">Upload up to 4 images of the product.</small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button <?php echo checkOrderItemExists($_GET['id']) ?  "disabled" :  '' ?> type="button" class="btn btn-primary" id="submit" onclick="submitForms()">Submit Request</button>
    </div>
</div>

<script>
    function submitForms() {
        var isLoggedIn = '<?php echo isset($_SESSION['login_id']) ? 1 : 0; ?>';
        if (isLoggedIn == 0) {
            location.href = 'login.php';
            return false;
        }

        var formData = new FormData(document.getElementById('requestForm'));
        start_load();

        $.ajax({
            url: 'admin/ajax.php?action=make_req',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Request sent successfully", "success");
                    end_load();
                } else {
                    alert("Error: " + resp);
                }
            },
            error: function(err) {
                alert("Error occurred: " + err.statusText);
                end_load();
            }
        });
    }
</script>