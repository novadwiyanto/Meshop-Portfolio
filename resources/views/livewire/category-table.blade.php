<div>
    <form wire:submit="save" id="myForm">
        <div class="card rounded shadow border p-4 bg-light mb-4">
            <div class="row">
                <div class="col-4">
                    <input wire:model="name" type="text" class="form-control mb-2" placeholder="Name category...">
                    @error('name')
                        <small><span class="error text-danger">{{ $message }}</span></small>
                    @enderror
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-dark">Create</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row justify-content-between">
        <div class="col-4">
            <select wire:model="pagination" class="form-select w-auto mb-4" aria-label="Default select example">
                <option value=5>5</option>
                <option value=10>10</option>
                <option value=20>20</option>
            </select>
        </div>
        <div class="col-4">
            <input wire:model="search" class="form-control w-100 mb-4" id="myInput" type="text"
                placeholder="Search..">
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <button wire:click="delete({{ $item->id }})"
                        wire:confirm="Are you sure you want to delete this post?" class="btn btn-danger btn-sm m-1">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
