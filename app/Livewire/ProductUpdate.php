<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\ProductForm;

class ProductUpdate extends Component
{
    public ProductForm $form;

    public $product, $id, $name, $price, $quantity, $category1 ;



    public function mount(Request $request)
    {
        $this->id = $request->route()->parameter('id');
        $this->product = Product::withTrashed()->with('category')->findOrFail($this->id);
        $this->form->name = $this->product->name;
        $this->form->price = $this->product->price;
        $this->form->quantity = $this->product->quantity;
        $this->category1 = $this->product->category->name;
    }

    public function update()
    {
        $query = $this->product->update($this->form->validate());
        if (!$query) {
            dd('gaagl');
        }
        noty()->timeout(1000)->progressBar(false)->addSuccess('Product updated.');
        return $this->redirect('/product');
    }

    #[Layout('admin-productUpdate')] 
    public function render()
    {
        $category = Category::all();
        return view('livewire.product-update', ['category' => $category]);
    }
}
