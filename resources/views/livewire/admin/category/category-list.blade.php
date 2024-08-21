<div>
    <div class="container-xxl">
        <div class="row">
            @php
                $counter = 0;
            @endphp

            @foreach ($allCategories as $category)
                @if ($counter < 4)
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div
                                    class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                                    @php
                                        $imageArray = json_decode($category->files, true);
                                        $imagePath = !empty($imageArray) ? $imageArray[0] : 'default.png';
                                    @endphp
                                    <img src="{{ asset('storage/uploads/' . $imagePath) }}" alt="{{ $category->title }}"
                                        class="avatar-xl">
                                </div>
                                <h4 class="mt-3 mb-0">{{ $category->title }}</h4>
                            </div>
                        </div>
                    </div>
                    @php
                        $counter++;
                    @endphp
                @endif
            @endforeach


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Categories List</h4>
                            <a href="{{route ('category.add')}}" class="btn btn-sm btn-primary">
                                Add Category
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
                                            <th>Categories</th>
                                            <th>Starting Price</th>
                                            <th>Create by</th>
                                            <th>ID</th>
                                            <th>Product Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($allCategories->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">No categories found</td>
                                            </tr>
                                        @else
                                            @foreach ($allCategories as $allcategory)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            @php
                                                                $imageArray = json_decode($allcategory->files, true);
                                                                $imagePath = !empty($imageArray)
                                                                    ? $imageArray[0]
                                                                    : 'default.png';
                                                            @endphp
                                                            <div
                                                                class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('storage/uploads/' . $imagePath) }}"
                                                                    alt="" class="avatar-md">
                                                            </div>
                                                            <p class="text-dark fw-medium fs-15 mb-0">
                                                                {{ $allcategory->title }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td>{{ $allcategory->created_by }}</td>
                                                    <td>{{ $allcategory->tag_id }}</td>
                                                    <td></td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <a href="{{ route('category.edit', $allcategory->id) }}" class="btn btn-soft-primary btn-sm">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                            <button type="button" class="btn btn-soft-danger btn-sm"
                                                                onclick="confirmDeletion({{ $allcategory->id }})">
                                                                <iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-2-broken"
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
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a>
                                    </li>
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

            function confirmDeletion(categoryId) {
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
                        @this.call('deleteCategory', categoryId);
                    }
                });
            }
        </script>
    </div>
