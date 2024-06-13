<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use App\Models\TransactionItem;
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
        $transaction = Transaction::where('id', $id)->first();

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
        $this->item = TransactionItem::with('product')->where('transaction_id', $id)->get();
        $price = Transaction::where('id', $id)->first(['total_price', 'status']);
        $this->price = (string)$price->total_price;
        $this->status = (string)$price->status;

        $this->dispatch('show-invoice');
    }

    public function render()
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', $this->status_query)->latest()->get();
        return view('livewire.user-transaction', [
            'transaction' => $transaction,
            'product' => $this->item,
            'price' => $this->price,
            'status' => $this->status
        ]);
    }
}
