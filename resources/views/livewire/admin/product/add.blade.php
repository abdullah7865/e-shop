<div>
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Photo</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="save" class="dropzone" id="myAwesomeDropzone"
                            data-plugin="dropzone" data-previews-container="#file-previews"
                            data-upload-preview-template="#uploadPreviewTemplate">
                            <!-- File Input -->
                            <input type="file" id="file-input" multiple wire:model="image" style="display:none;"
                                accept="image/*" />

                            <div class="dz-message needsclick" id="upload-zone"
                                onclick="document.getElementById('file-input').click();">
                                <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to
                                        browse</span></h3>
                                <span class="text-muted fs-13">1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are
                                    allowed</span>
                            </div>

                            @if ($previews)
                                <div class="d-flex justify-content-start mt-4">
                                    @foreach ($previews as $preview)
                                        <div class="me-3">
                                            <img src="{{ $preview }}" alt="Image Preview" class="img-fluid"
                                                style="max-width: 100px; height: auto;" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @error('image')
                                <div class="text-danger mt-2">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product Name</label>
                                    <input type="text" wire:model="name" name="name" id="product-name"
                                        class="form-control" placeholder="Items Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="product-categories" class="form-label">Product Categories</label>
                                <select wire:model="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    id="product-categories" data-choices data-choices-groups
                                    data-placeholder="Select Categories" name="choices-single-groups">
                                    <option value="">Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-brand" class="form-label">Brand</label>
                                    <input type="text" wire:model="brand" id="product-brand" class="form-control"
                                        placeholder="Brand Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-weight" class="form-label">Weight</label>
                                    <input type="number" wire:model="weight" id="product-weight" class="form-control"
                                        placeholder="In gm">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select wire:model="gender" class="form-control @error('gender') is-invalid @enderror"
                                    id="gender" data-choices data-choices-groups data-placeholder="Select Gender">
                                    <option value="">Select Gender</option>
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Size :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        @foreach ($sizes as $size)
                                            <input type="checkbox" multiple wire:model="selectedSizes"
                                                value="{{ $size->id }}"
                                                class="btn-check @error('selectedSizes') is-invalid @enderror"
                                                id="size-{{ $size->id }}">
                                            <label
                                                class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                for="size-{{ $size->id }}">
                                                {{ $size->size_label }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">number :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        @foreach ($sizes as $size)
                                            <input type="checkbox" multiple wire:model="selectedSizes"
                                                value="{{ $size->id }}"
                                                class="btn-check @error('selectedSizes') is-invalid @enderror"
                                                id="size-{{ $size->id }}">
                                            <label
                                                class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                for="size-{{ $size->id }}">
                                                {{ $size->size_label }}
                                            </label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Colors :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        @foreach ($colors as $color)
                                            <input type="checkbox" multiple wire:model="selectedColors"
                                                value="{{ $color['color_name'] }}"
                                                class="btn-check @error('selectedColors') is-invalid @enderror"
                                                id="color-{{ strtolower($color['color_name']) }}">
                                            <label
                                                class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                for="color-{{ strtolower($color['color_name']) }}">
                                                <i class="bx bxs-circle fs-18 {{ $color['color_class'] }}"></i>
                                            </label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea wire:model="description" class="form-control bg-light-subtle @error('description') is-invalid @enderror"
                                        id="description" rows="7" placeholder="Short description about the product"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-id" class="form-label">Tag Number</label>
                                    <input wire:model="tag_number" type="number" id="product-id"
                                        class="form-control @error('tag_number') is-invalid @enderror"
                                        placeholder="#******">
                                    @error('tag_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-stock" class="form-label">Stock</label>
                                    <input wire:model="stock" type="number" id="product-stock"
                                        class="form-control @error('stock') is-invalid @enderror"
                                        placeholder="Quantity">
                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="product-stock" class="form-label">Tag</label>
                                <select multiple wire:model="tag" class="form-control"
                                    id="choices-multiple-remove-button" data-choices data-choices-removeItem
                                    name="choices-multiple-remove-button">
                                    <option value="Fashion" selected>Fashion</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Watches">Watches</option>
                                    <option value="Headphones">Headphones</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pricing Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="product-price" class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                    <input wire:model="price" type="number" id="product-price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="000">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label for="product-discount" class="form-label">Discount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span>
                                    <input wire:model="discount" type="number" id="product-discount"
                                        class="form-control" placeholder="000">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="product-tex" class="form-label">Tex</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text fs-20"><i class='bx bxs-file-txt'></i></span>
                                    <input wire:model="tax" type="number" id="product-tex" class="form-control"
                                        placeholder="000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-outline-secondary w-100">Create Product</button>
                        </div>
                    </div>
                </div>
                </form>
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
    </script>
</div>
