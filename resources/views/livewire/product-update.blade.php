<div>
    <h4>Product Update</h4>
    <hr>
    <form wire:submit="update">

        <div class=" mb-3">
            <label class="small mb-1">Name</label>
            <input wire:model="form.name" type="text" class="form-control" id="name" name="name">
            @error('form.name')
                <small><span class="error text-danger">{{ $message }}</span></small>
            @enderror
        </div>
        <div class="row gx-3 mb-3">
            <div class="col-md-6 mb-3">
                <label class="small mb-1">Price</label>
                <input wire:model="form.price" type="number" class="form-control" id="price" name="price">
                @error('form.price')
                    <small><span class="error text-danger">{{ $message }}</span></small>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="small mb-1">Stock</label>
                <input wire:model="form.quantity" type="text" class="form-control mb-2" id="quantity">
                @error('form.quantity')
                    <small><span class="error text-danger">{{ $message }}</span></small>
                @enderror
            </div>
        </div>
        <div class="row gx-3 mb-3">
            <div class="col-md-6 mb-3">
                <label class="small mb-1">Category</label>
                <select wire:model="form.category_id" class="form-select">
                    <option value="null" disabled>{{ $category1 }}</option>
                    <option value="">None</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="small mb-1">Image</label>
                <div class="d-flex justify-content-between">
                    <input type="file" disabled class="form-control" />
                    <a class="btn btn-dark ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">?</a>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-sm">Update</button>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <p>sorry bro, file uploading doesn't work on this free hosting.</p>
            </div>
        </div>
    </div>
</div>
