<div>
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Thumbnail Photo</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                            data-previews-container="#file-previews"
                            data-upload-preview-template="#uploadPreviewTemplate">
                            <input type="file" id="file-input" multiple wire:model="files" style="display:none;"
                                accept="image/*" />
                            <div class="dz-message needsclick" id="upload-zone"
                                onclick="document.getElementById('file-input').click();">
                                <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to
                                        browse</span></h3>
                                <span class="text-muted fs-13">1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are
                                    allowed</span>
                                @if ($previews)
                                    <div class="row mt-3">
                                        @foreach ($previews as $preview)
                                            <div class="col-md-3">
                                                <img src="{{ $preview }}" alt="Image Preview" class="img-fluid" />
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">General Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="category-title" class="form-label">Category Title</label>
                                    <input type="text" id="category-title" class="form-control"
                                        placeholder="Enter Title" wire:model="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="crater" class="form-label">Created By</label>
                                <select class="form-control" id="crater" wire:model="createdBy">
                                    <option value="">Select Crater</option>
                                    <option value="Seller" {{ $createdBy === 'Seller' ? 'selected' : '' }}>Seller
                                    </option>
                                    <option value="Admin" {{ $createdBy === 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Other" {{ $createdBy === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('createdBy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-id" class="form-label">Tag ID</label>
                                    <input type="number" id="product-id" class="form-control" placeholder="#******"
                                        wire:model="tagId">
                                    @error('tagId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="description" rows="7" placeholder="Type description"
                                        wire:model="description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">Meta Options</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-title" class="form-label">Meta Title</label>
                                    <input type="text" id="meta-title" class="form-control" placeholder="Enter Title"
                                        wire:model="metaTitle">
                                    @error('metaTitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-tag" class="form-label">Meta Tag Keyword</label>
                                    <input type="text" id="meta-tag" class="form-control" placeholder="Enter word"
                                        wire:model="metaTag">
                                    @error('metaTag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label for="meta-description" class="form-label">Meta Description</label>
                                    <textarea class="form-control bg-light-subtle" id="meta-description" rows="4" placeholder="Type description"
                                        wire:model="metaDescription"></textarea>
                                    @error('metaDescription')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-light mb-3 rounded mt-3">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-outline-secondary w-100">Save Changes</button>
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
