<!-- Modal Edit -->
<div class="modal fade" id="updateMainShopModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdrop2Label">Main Shops Update
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              
            <div class="modal-body">
                <form action="{{ route('m-update', $mainshops->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Add this line to specify the method as PUT for update -->
                    
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-cm-10">
                            <input class="form-control" name="name" type="text" placeholder="Name Enter ..." id="name" value="{{ $mainshops->name }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-cm-2 col-form-6label">Image</label>
                        <div class="col-cm-10">
                            <input class="form-control" name="image" type="file" placeholder="Image Enter ..." id="image">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            @if ($mainshops->image)
                                <img src="{{ asset($mainshops->image) }}" alt="{{ $mainshops->name }}" style="max-width: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>