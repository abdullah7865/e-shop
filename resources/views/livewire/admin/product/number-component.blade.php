<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">List</h4>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addNumberModal">
                            Add
                        </button>


                        <!-- Modal HTML -->
                        <div class="modal fade" id="addNumberModal" tabindex="-1" aria-labelledby="addNumberModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNumberModalLabel">Add New number</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="addSize">
                                            <div class="mb-3">
                                                <label for="number" class="form-label">Number</label>
                                                <input type="number" wire:model="number" class="form-control"
                                                    id="number" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Number</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($numbers as $number)
                                        <tr>
                                            <td>{{ $number->number }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button onclick="confirmDeletion({{ $number->id }})" class="btn btn-soft-danger btn-sm">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    {{-- <div class="card-footer border-top">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('hide-modal', event => {
       var myModalEl = document.getElementById('addNumberModal');
       var modal = bootstrap.Modal.getInstance(myModalEl);
       if (modal) {
           modal.hide();
       }
   });

   window.addEventListener('swal', event => {
           Swal.fire({
               title: event.detail[0].title,
               text: event.detail[0].text,
               icon: event.detail[0].icon,
           });
       });

       function confirmDeletion(numberId) {
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
                @this.call('delete', numberId);
            }
        });
    }
   </script>
</div>
