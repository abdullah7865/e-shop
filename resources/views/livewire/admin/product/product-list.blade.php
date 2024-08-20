<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Product List</h4>
                        <a href="product-add.html" class="btn btn-sm btn-primary">
                            Add Product
                        </a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                This Month
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check ms-1">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Product Name & Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="form-check ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customCheck{{ $product->id }}">
                                                    <label class="form-check-label"
                                                        for="customCheck{{ $product->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div
                                                        class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                        @php
                                                            $imageArray = json_decode($product->images, true);
                                                            $imagePath = !empty($imageArray)
                                                                ? $imageArray[0]
                                                                : 'default.png';
                                                        @endphp
                                                        <img src="{{ asset('storage/' . $imagePath) }}"
                                                            alt="" class="avatar-md">
                                                    </div>
                                                    <div>
                                                        <a href="#!"
                                                            class="text-dark fw-medium fs-15">{{ $product->name }}</a>
                                                        <p class="text-muted mb-0 mt-1 fs-13">
                                                            <span>Size : </span>
                                                            @foreach (json_decode($product->sizes) as $size)
                                                                {{ $size }}{{ !$loop->last ? ', ' : '' }}
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td>
                                                <p class="mb-1 text-muted"><span
                                                        class="text-dark fw-medium">{{ $product->stock }} Item</span>
                                                    </p>
                                            </td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                @if (isset($product->rating))
                                                    <span class="badge p-1 bg-light text-dark fs-12 me-1">
                                                        <i
                                                            class="bx bxs-star align-text-top fs-14 text-warning me-1"></i>
                                                        {{ number_format($product->rating, 1) }}
                                                    </span>
                                                    {{ $product->reviews_count }} Review
                                                @else
                                                    No Rating
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="#!" class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="#!" class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="#!" class="btn btn-soft-danger btn-sm">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
