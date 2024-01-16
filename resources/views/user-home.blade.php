@extends('layouts.app-user')

@section('title', 'Home')

@section('content')
    <div class="row">
        <livewire:user-product />
        <livewire:user-cart />
    </div>
@endsection
