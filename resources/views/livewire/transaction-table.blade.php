<div>
    <button wire:click="alldata" class="btn btn-sm btn-dark me-2">All</button>
    <button wire:click="pending" class="btn btn-sm btn-dark me-2">Pending</button>
    <button wire:click="paid" class="btn btn-sm btn-dark me-3">Paid</button>
    <hr>
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
                <th>Name</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $key => $item)
                <tr>
                    <td>{{ $transaction->firstItem() + $key }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->total_price) }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transaction->links() }}
</div>
