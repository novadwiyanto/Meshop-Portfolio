<div>
    <div style="margin-top: 80px">
        <div class="container rounded shadow p-3 mb-3">
            <p>Transaction</p>
            <hr>
            <button wire:click="pending" class="btn btn-sm btn-dark me-2">Pending</button>
            <button wire:click="paid" class="btn btn-sm btn-dark me-3">Paid</button>
            <hr>
            <!-- Transaction -->
            @foreach ($transaction as $item)
                <div class="row justify-content-between cart-list mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row mb-3">
                            <div>
                                <img src={{ asset('300.png') }} class="rounded"
                                    style="width: 75px; image-resolution: 1/1;">
                            </div>
                            <div class="m-2 ms-5">
                                <p class="small mb-0">{{ $item->name }}</p>
                                <p class="small mb-0">{{ $item->created_at }}</p>
                            </div>
                        </div>
                        <div class="m-2">
                            <p class="small mb-0">{{ $item->status }} </p>
                            <p class="small mb-0">Rp. {{ number_format($item->total_price) }}</p>
                        </div>
                        <div class="m-2 me-3 pe-3">
                            <input wire:click="show({{ $item->id }})" type="button"
                                class="btn w-100 btn-sm btn-dark" value="Invoice">
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Transaction -->
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content card shadow p-3">
                <h6>INVOICE</h6>
                <hr class="m-0">
                <table class="table p-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>#</th>
                            <th>Unit Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    @if ($product)
                        <tbody>
                            @foreach ($product as $item)
                                <tr class="fw-lighter">
                                    <td class="col-md-4"><small>{{ $item->product->name }}</small></td>
                                    <td class="col-md-1"><small>{{ $item->quantity }}</small></td>
                                    <td class="col-md-3"><small>Rp. {{ number_format($item->product->price) }}</small></td>
                                    <td class="col-md-4"><small>RP.
                                            {{ number_format($item->quantity * $item->product->price) }}</small>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold">
                                <td class="col-md-4">Total</td>
                                <td class="col-md-1"></td>
                                <td class="col-md-3"></td>
                                <td class="col-md-4">Rp. {{ number_format($price) }}</td>
                            </tr>
                        </tbody>
                    @endif
                </table>

                @if ($product)
                    <div class="d-flex justify-content-center mt-3">
                        @if ($status == 'Pending')
                            <button wire:click="pay({{ $product[0]->transaction_id }})"
                                wire:confirm="Are you sure you want to pay this transaction?"
                                class="btn btn-sm btn-dark me-3">Pay Now</button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('show-invoice', () => {
                var myModal = new bootstrap.Modal(document.getElementById("detail"), {});
                myModal.show();
            });
            $wire.on('hide-invoice', () => {
                var myModal = new bootstrap.Modal(document.getElementById("detail"), {});
                myModal.hide();
            });
        </script>
    @endscript
</div>
