<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;
use Livewire\Attributes\Validate;

class CategoryTable extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    public function save()
    {
        $validated = $this->validate();
 
        category::create($validated);
        noty()->timeout(1000)->progressBar(false)->addSuccess('Category successfuly created.');
    }

    public function delete($id)
    {
        $category = category::where('id', $id)->first();
        $category->delete();
        noty()->timeout(1000)->progressBar(false)->addError('Category successfuly deleted.');
    }

    public function render()
    {
        $category = category::all();
        return view('livewire.category-table', ['category' => $category]);

    }
}
