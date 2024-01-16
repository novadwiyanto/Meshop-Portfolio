<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\ProductForm;

class ProductCreate extends Component
{
    use WithFileUploads;

    public ProductForm $form;

    public function save()
    {
        product::create($this->form->validate());
        $this->form->reset();
        noty()->timeout(1000)->progressBar(false)->addSuccess('Product successfuly created.');
        return $this->redirect('/product');
    }

    public function render()
    {
        $category = category::all();
        return view('livewire.product-create', ['category' => $category]);
    }
}
