<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    #[Validate('nullable')]
    public $category_id = null;
    
    #[Validate('required|min:6')]
    public $name = '';
 
    #[Validate('required')]
    public $price = '';

    #[Validate('required')]
    public $quantity = '';
}
