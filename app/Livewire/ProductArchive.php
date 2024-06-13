<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductArchive extends Component
{
    use WithPagination;

    public $productShow, $name, $price, $quantity, $status, $category;
    public $search = '';
    public $pag = 5;

    public function delete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->forceDelete();
        noty()->timeout(1000)->progressBar(false)->addError('Product deleted.');
    }
    
    public function restore($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->restore();
        noty()->timeout(1000)->progressBar(false)->addSuccess('Product Un-Archive.');
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detail($id)
    {
        $this->productShow = Product::onlyTrashed()->where('id', $id)->first();
        $this->name = $this->productShow->name;
        $this->price = $this->productShow->price;
        $this->quantity = $this->productShow->quantity;
        $this->category = $this->productShow->category->name;
    }

    public function render()
    {
        $products = Product::onlyTrashed()->where('name', 'like', '%'.$this->search.'%')->latest()->paginate($this->pag);
        return view('livewire.product-archive', ['product' => $products, 'show' => $this->productShow]);
    }
}
