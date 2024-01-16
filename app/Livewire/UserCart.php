<?php

namespace App\Livewire;

use App\Models\cart;
use App\Models\product;
use Livewire\Component;
use App\Models\transaction;
use Livewire\Attributes\On;
use App\Models\transactionItem;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserCart extends Component
{
    public $current_transaction;
    public $item;
    public $status;

    #[Validate('required|min:4')]
    public $name = 'Customer';

    #[Validate('required|min:11|max:11')]
    public $phone = '85123123123';

    #[Validate('required')]
    public $address = 'My Adress';

    public function pay($id)
    {
        $transaction = transaction::where('id', $id)->first();

        if ($transaction->status !== 'Pending') {
            noty()->timeout(1000)->progressBar(false)->addError('Product already paid.');
        } else {
            $transaction->status = 'Paid';
            $transaction->save();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Transaction paid.');
            $this->status = $transaction->status;
        }
    }

    public function checkout()
    {
        $this->validate();

        $cart = cart::where('user_id', Auth::user()->id)
        ->whereRelation('product', 'deleted_at', null)->get();

        foreach ($cart as $value) {
            $price = $value->product->price;
            $quantity = $value->quantity;
            $paid[] = (int)$price * (int)$quantity;
        }

        try {
            DB::beginTransaction();
            $transaction = new transaction;

            $transaction->user_id = Auth::user()->id;
            $transaction->name = $this->name;
            $transaction->address = $this->address;
            $transaction->phone = $this->phone;
            $transaction->payment = 'Default';
            $transaction->total_price = array_sum($paid);
            $transaction->status = 'Pending';

            $transaction->save();

            foreach ($cart as $value) {
                $item = new transactionItem;

                $item->user_id = Auth::user()->id;
                $item->transaction_id = $transaction->id;
                $item->product_id = $value->product_id;
                $item->quantity = $value->quantity;

                $item->save();
            }

            cart::where('user_id', Auth::user()->id)->delete();

            $this->current_transaction = transaction::where('id', $transaction->id)->first();
            $this->item = transactionItem::with('product')->where('transaction_id', $transaction->id)->get();
            $this->status = $transaction->status;


            noty()->timeout(1000)->progressBar(false)->addSuccess('Checkout Success.');
            $this->dispatch('show-checkout');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($cart->isEmpty()) {
                noty()->timeout(1000)->progressBar(false)->addError('No product in cart.');
            } else {
                noty()->timeout(1000)->progressBar(false)->addError('Transaction failed.');
            }
        }
    }

    public function delete($id)
    {
        $cart = cart::where('id', $id)->first();
        $cart->delete();
        noty()->timeout(1000)->progressBar(false)->addError('Product deleted.');
    }

    public function plus($id)
    {
        $cart = cart::where('id', $id)->first();
        $product = product::where('id', $cart->product_id)->first();

        if ($cart->quantity != $product->quantity) {
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
        }

        if ($cart->quantity >= $product->quantity) {
            noty()->timeout(1000)->progressBar(false)->addError('Product limits.');
        }
    }

    public function minus($id)
    {
        $cart = cart::where('id', $id)->first();
        if ($cart->quantity > 1) {
            $cart->quantity = $cart->quantity - 1;
            $cart->save();
        }

        if ($cart->quantity <= 1) {
            noty()->timeout(1000)->progressBar(false)->addError('Product limits.');
        }
    }

    #[On('add-cart')]
    public function render()
    {

        $cart = cart::where('user_id', Auth::user()->id)
        ->whereRelation('product', 'deleted_at', null)->get();

        foreach ($cart as $value) {
            $cart_price = $value->product->price;
            $cart_quantity = $value->quantity;
            $price_product[] = $cart_price * $cart_quantity;
        };

        if (!empty($price_product)) {
            $price = array_sum($price_product);
        } else {
            $price = 0;
        }
        
        return view('livewire.user-cart', [
            'cart' => $cart,
            'price' => $price,
            'transaction' => $this->current_transaction,
            'product' => $this->item,
            'status' => $this->status
        ]);
    }
}
