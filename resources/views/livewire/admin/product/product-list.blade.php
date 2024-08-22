<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Product List</h4>
                        <a href="{{ route('product.add') }}" class="btn btn-sm btn-primary">
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

                                        <th>Product Name & Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Rating</th>
                                        <th>Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">No products found</td>
                                        </tr>
                                    @else
                                        @foreach ($products as $product)
                                            <tr>
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
                                                                    @php
                                                                        $sizeIds = json_decode($product->sizes);
                                                                        $sizes = \App\Models\Size::whereIn('id', $sizeIds)
                                                                            ->pluck('size_label', 'id')
                                                                            ->toArray();

                                                                        $numberIds = json_decode($product->numbers);
                                                                        $numbers = \App\Models\Number::whereIn('id', $numberIds)
                                                                            ->pluck('number', 'id')
                                                                            ->toArray();

                                                                        $showSizes = !empty($sizes);
                                                                        $showNumbers = !$showSizes && !empty($numbers);
                                                                    @endphp

                                                                    @if ($showSizes)
                                                                        <span>Size : </span>
                                                                        @foreach ($sizeIds as $sizeId)
                                                                            {{ $sizes[$sizeId] ?? 'Unknown' }}{{ !$loop->last ? ', ' : '' }}
                                                                        @endforeach
                                                                    @elseif ($showNumbers)
                                                                        <span>Number : </span>
                                                                        @foreach ($numberIds as $numberId)
                                                                            {{ $numbers[$numberId] ?? 'Unknown' }}{{ !$loop->last ? ', ' : '' }}
                                                                        @endforeach
                                                                    @else
                                                                        <span></span>
                                                                    @endif
                                                                </p>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>${{ number_format($product->price, 2) }}</td>
                                                <td>
                                                    <p class="mb-1 text-muted"><span
                                                            class="text-dark fw-medium">{{ $product->stock }}
                                                            Item</span>
                                                    </p>
                                                </td>
                                                <td>{{ $product->category->title }}</td>
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
                                                        {{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}
                                                    </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="#!" class="btn btn-light btn-sm">
                                                            <iconify-icon icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                        <button onclick="confirmDeletion({{ $product->id }})"
                                                            class="btn btn-soft-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                {{-- Previous Page Link --}}
                                @if($products->onFirstPage())
                                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                {{-- Pagination Links --}}
                                @for($page = 1; $page <= $products->lastPage(); $page++)
                                    <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                {{-- Next Page Link --}}
                                @if($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail[0].title,
                text: event.detail[0].text,
                icon: event.detail[0].icon,
            });
        });


        function confirmDeletion(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', productId);
                }
            });
        }
    </script>
</div>
