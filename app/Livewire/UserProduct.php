<?php

namespace App\Livewire;

use App\Models\cart;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserProduct extends Component
{

    use WithPagination;

    public $search = '';
    
    public function add($id)
    {
        $product = product::where('id', $id)->first();

        $cart_exist = cart::where('product_id', $product->id)->first();

        if ($cart_exist !== null && $cart_exist->quantity != $product->quantity) {
            $cart_exist->quantity = $cart_exist->quantity + 1;
            $cart_exist->save();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Product quantity added.');
        } 
        
        if ($cart_exist == null) {
            $cart = new cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $product->id;
            $cart->quantity = 1;
            $cart->save();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Product added.');
        }

        if ($cart_exist !== null && $cart_exist->quantity >= $product->quantity) {
            noty()->timeout(1000)->progressBar(false)->addError('Product limits.');
        }

        $this->dispatch('add-cart');
    }


    public function render()
    {
        $product = product::where('name', 'like', '%'.$this->search.'%')->where('quantity', '>', '0')->latest()->paginate(18);
        return view('livewire.user-product', ['product' => $product]);
    }
}
