<div class="container mb-5">

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Repair Issue</th>
                        <th>Repair Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><a class="fw-semibold" style="color: blue;" href="">1</a></td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>John Doe</td>
                        <td>
                            <ul>
                                <li>Broken chain link</li>
                                <li>Scratches on gemstone</li>
                                <li>Loose clasp</li>
                            </ul>
                        </td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept(1)">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny(1)">Deny</button>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="fw-semibold" style="color: blue;" href="">1</a></td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>John Doe</td>
                        <td>
                            <ul>
                                <li>Broken chain link</li>
                                <li>Scratches on gemstone</li>
                                <li>Loose clasp</li>
                            </ul>
                        </td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept(1)">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny(1)">Deny</button>
                        </td>
                    </tr>
                    <tr>
                        <td><a class="fw-semibold" style="color: blue;" href="">1</a></td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>John Doe</td>
                        <td>
                            <ul>
                                <li>Broken chain link</li>
                                <li>Scratches on gemstone</li>
                                <li>Loose clasp</li>
                            </ul>
                        </td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept(1)">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny(1)">Deny</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>