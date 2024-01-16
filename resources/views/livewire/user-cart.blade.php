<!-- Right -->
<div class="col-sm-12 col-md-4">
    <div class="cart bg-light p-3 mb-3">
        <div class="my-cart fw-bold">My Cart</div>
        <hr>
        <div class="list-cart h-50 d-inline-block">
            <div class="row mt-2 m-0">
                <!-- Cart -->
                @foreach ($cart as $item)
                    <div class="row justify-content-between cart-list mb-3">
                        <div class="d-flex justify-content-between">
                            <img class="img-cart rounded me-2" src="{{ asset('300.png') }}">
                            <div>
                                <p class="mt-1 mb-1" style="max-width: 100px;">{{ $item->product->name }}</p>
                                <div class="input-group input-group-sm">
                                    <button wire:click="minus({{ $item->id }})" class="input-group-text"><i
                                            class="bi bi-dash"></i></button>
                                    <input type="text" class="form-control text-center"
                                        value="{{ $item->quantity }}">
                                    <button wire:click="plus({{ $item->id }})" class="input-group-text"><i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div>
                            <div>
                                <p class="mt-1 mb-1 ms-3 text-secondary">Rp. {{ number_format($item->product->price) }}
                                </p>
                                <a wire:click="delete({{ $item->id }})"
                                    class="icon text-black d-flex justify-content-end"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- End Cart -->
            </div>
        </div>
    </div>

    <!-- Invoice -->
    <div class="cart-bottom m-3">
        <form wire:submit.prevent="checkout">
            <div class="row">
                <hr>
                <div class="d-flex justify-content-between">
                    <div>Total</div>
                    <div>
                        <p>Rp. {{ number_format($price) }}</p>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <input wire:model="name" type="text" class="form-control form-control-sm" placeholder="Name">
                </div>
                <div class="col">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text">+62</span>
                        <input wire:model="phone" type="number" pattern="/^-?\d+\.?\d*$/"
                            onkeydown="return event.keyCode !== 69" onKeyPress="if(this.value.length==11) return false;"
                            class="form-control form-control-sm" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <input wire:model="address" type="text" class="form-control form-control-sm"
                        placeholder="Address">
                </div>
                <div class="col">
                    <input type="text" class="form-control form-control-sm" placeholder="Payment" readonly>
                </div>
            </div>
            <div>
                @error('*')
                    <small><span class="error text-danger">{{ $message }}</span></small>
                @enderror
            </div>
            <hr>
            <button type="submit" class="btn w-100 btn-sm btn-dark">Checkout</button>
        </form>
    </div>


    <div wire:ignore.self class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content card shadow p-3">
                <h6>INVOICE</h6>
                <hr class="m-0">
                <table class="table p-0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>#</th>
                            <th>Unit Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    @if ($transaction)
                        <tbody>
                            @foreach ($product as $item)
                                <tr class="fw-lighter">
                                    <td class="col-md-4"><small>{{ $item->product->name }}</small></td>
                                    <td class="col-md-1"><small>{{ $item->quantity }}</small></td>
                                    <td class="col-md-3"><small>Rp. {{ number_format($item->product->price) }}</small>
                                    </td>
                                    <td class="col-md-4"><small>RP.
                                            {{ number_format($item->quantity * $item->product->price) }}</small></td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold">
                                <td class="col-md-4">Total</td>
                                <td class="col-md-1"></td>
                                <td class="col-md-3"></td>
                                <td class="col-md-4">
                                    Rp. {{ number_format($transaction->total_price) }}
                                </td>
                            </tr>
                        </tbody>
                    @endif
                </table>

                @if ($transaction)
                    <div class="d-flex justify-content-center mt-3">
                        @if ($status == 'Pending')
                            <button wire:click="pay({{ $transaction->id }})"
                                wire:confirm="Are you sure you want to pay this transaction?"
                                class="btn btn-sm btn-dark me-3">Pay Now</button>
                        @endif
                        <a href="/transaction" class="btn btn-sm btn-dark px-3"><i
                                class="bi bi-clipboard2-data-fill"></i>Transaction</a>
                    </div>
                @endif
            </div>
        </div>
    </div>


    @script
        <script>
            $wire.on('show-checkout', () => {
                var myModal = new bootstrap.Modal(document.getElementById("checkout"), {});
                myModal.show();
            });
        </script>
    @endscript
</div>
