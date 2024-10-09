<div class="container mb-5">
    <div class="container mt-3 fs-base fw-bold mb-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Warranty Claims</li>
            </ol>
        </nav>
    </div>

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
                        <th>Today's Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>
                            <a href="#" class="fw-bold" style="color: blue;" data-bs-toggle="modal" data-bs-target="#viewImagesModal{{ $i + 1 }}">
                                {{ $i + 1 }}
                            </a>
                        </td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>2 years</td>
                        <td>John Doe</td>
                        <td>2022-10-15</td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept({{ $i + 1 }})">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny({{ $i + 1 }})">Deny</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewImagesModal{{ $i + 1 }}" tabindex="-1" aria-labelledby="viewImagesModalLabel{{ $i + 1 }}" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewImagesModalLabel{{ $i + 1 }}">Damaged Product Images - Request {{ $i + 1 }}</h5>
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
                    <tr>
                        <td>
                            <a href="#" class="fw-bold" style="color: blue;" data-bs-toggle="modal" data-bs-target="#viewImagesModal{{ $i + 1 }}">
                                {{ $i + 1 }}
                            </a>
                        </td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>2 years</td>
                        <td>John Doe</td>
                        <td>2022-10-15</td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept({{ $i + 1 }})">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny({{ $i + 1 }})">Deny</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewImagesModal{{ $i + 1 }}" tabindex="-1" aria-labelledby="viewImagesModalLabel{{ $i + 1 }}" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewImagesModalLabel{{ $i + 1 }}">Damaged Product Images - Request {{ $i + 1 }}</h5>
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
                    <tr>
                        <td>
                            <a href="#" class="fw-bold" style="color: blue;" data-bs-toggle="modal" data-bs-target="#viewImagesModal{{ $i + 1 }}">
                                {{ $i + 1 }}
                            </a>
                        </td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                        <td>2 years</td>
                        <td>John Doe</td>
                        <td>2022-10-15</td>
                        <td><?php echo date("Y/m/d") ?></td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept({{ $i + 1 }})">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny({{ $i + 1 }})">Deny</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewImagesModal{{ $i + 1 }}" tabindex="-1" aria-labelledby="viewImagesModalLabel{{ $i + 1 }}" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewImagesModalLabel{{ $i + 1 }}">Damaged Product Images - Request {{ $i + 1 }}</h5>
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

                </tbody>
            </table>
        </div>
    </div>

</div>