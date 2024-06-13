<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;

    public $name, $price, $quantity, $category;
    public $search = '';
    public $pag = 10;

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        noty()->timeout(1000)->progressBar(false)->addError('Product archive.');
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detail($id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        $this->name = $product->name;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->category = $product->category->name;
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')->where('quantity', '>', '0')->latest()->paginate($this->pag);
        return view('livewire.product-table', ['product' => $products]);
    }
}
