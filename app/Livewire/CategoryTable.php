<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;

class CategoryTable extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    public function save()
    {
        $validated = $this->validate();
 
        Category::create($validated);
        noty()->timeout(1000)->progressBar(false)->addSuccess('Category successfuly created.');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        noty()->timeout(1000)->progressBar(false)->addError('Category successfuly deleted.');
    }

    public function render()
    {
        $category = Category::all();
        return view('livewire.category-table', ['category' => $category]);

    }
}
