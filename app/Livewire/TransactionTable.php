<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TransactionTable extends Component
{
    use WithPagination;
    public $search = '';
    public $status_query = '';

    public function alldata()
    {
        $this->status_query = "";
    }
    
    public function pending()
    {
        $this->status_query = "Pending";
    }

    public function paid()
    {
        $this->status_query = "Paid";
    }

    public $pag = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $transaction = transaction::where('name', 'like', '%' . $this->search . '%')
            ->where('status', 'like', '%' . $this->status_query . '%')
            ->latest()->paginate($this->pag);
        return view('livewire.transaction-table', ['transaction' => $transaction]);
    }
}
