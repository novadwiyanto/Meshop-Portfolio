<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\transaction;
use Livewire\Attributes\On;
use App\Models\transactionItem;
use Illuminate\Support\Facades\Auth;

class UserTransaction extends Component
{
    public $item, $price, $status;
    public $status_query = 'pending';

    public function pending()
    {
        $this->status_query = "Pending";
    }

    public function paid()
    {
        $this->status_query = "Paid";
    }

    public function pay($id)
    {
        $transaction = transaction::where('id', $id)->first();

        if ($transaction->status !== 'Pending') {
            noty()->timeout(1000)->progressBar(false)->addError('Product already paid.');
        } else {
            $transaction->status = 'Paid';
            $transaction->save();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Transaction paid.');
            $this->status = $transaction->statu;
        }
    }

    public function show($id)
    {
        $this->item = transactionItem::with('product')->where('transaction_id', $id)->get();
        $price = transaction::where('id', $id)->first(['total_price', 'status']);
        $this->price = (string)$price->total_price;
        $this->status = (string)$price->status;

        $this->dispatch('show-invoice');
    }

    public function render()
    {
        $transaction = transaction::where('user_id', Auth::user()->id)->where('status', $this->status_query)->latest()->get();
        return view('livewire.user-transaction', [
            'transaction' => $transaction,
            'product' => $this->item,
            'price' => $this->price,
            'status' => $this->status
        ]);
    }
}
