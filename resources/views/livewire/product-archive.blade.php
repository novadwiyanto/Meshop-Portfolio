<div>
    <div class="row justify-content-between">
        <div class="col-4">
            <select wire:model.live="pag" class="form-select w-auto mb-4" aria-label="Default select example">
                <option value=5>5</option>
                <option value=10>10</option>
                <option value=20>20</option>
            </select>
        </div>
        <div class="col-4">
            <input wire:model.live="search" class="form-control w-100 mb-4" type="text" placeholder="Search..">
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $key => $item)
                <tr>
                    <td>{{ $product->firstItem() + $key }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <button class="btn btn-dark btn-sm m-1" data-bs-toggle="modal" data-bs-target="#detail-modal"
                            wire:click="detail({{ $item->id }})">Detail</button>
                        <button class="btn btn-dark btn-sm m-1"
                            wire:click="restore({{ $item->id }})"
                            wire:confirm="Are you sure you want to Un-Archive this product?">Un-Archive</button>
                        <a href="product/{{ $item->id }}" class="btn btn-primary btn-sm m-1">Update</a>
                        <button type="button" wire:click="delete({{ $item->id }})"
                            class="btn btn-danger btn-sm m-1"
                            wire:confirm="Are you sure you want to delete this product?">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $product->links() }}


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="detail-modal">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content card shadow p-4">
                <h4>Detail Product</h4>
                <hr class="m-0">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" wire:model="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Price</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" value=":"
                                wire:model="price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Quantity</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" wire:model="quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Category</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" wire:model="category">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
