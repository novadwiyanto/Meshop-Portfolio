<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSoldout extends Component
{
    use WithPagination;

    public $productShow, $name, $price, $quantity, $category;
    public $search = '';
    public $pag = 5;

    public function delete($id)
    {
        $product = product::where('id', $id)->first();
        $product->Delete();
        noty()->timeout(1000)->progressBar(false)->addError('Product archive.');
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detail($id)
    {
        $this->productShow = product::with('category')->where('id', $id)->first();
        $this->name = $this->productShow->name;
        $this->price = $this->productShow->price;
        $this->quantity = $this->productShow->quantity;
        $this->category = $this->productShow->category->name;
    }

    public function render()
    {
        $products = product::where('quantity', '0')->where('name', 'like', '%'.$this->search.'%')->latest()->paginate($this->pag);
        return view('livewire.product-soldout', ['product' => $products, 'show' => $this->productShow]);
    }
}
