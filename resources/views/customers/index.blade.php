@extends('layout')

@section('title', 'Customer List')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="text-center">Customers List</h1>
        <p><a href="customers/create">Add New Customer</a></p>
    </div>
</div>

@foreach($customers as $customer)
<div class="row">
    <div class="col-2">
        {{ $customer->id }}
    </div>
    <div class="col-4">
        <a href="/customers/{{ $customer->id }}">
            {{ $customer->name }}
        </a>
    </div>
    <div class="col-4">
        {{ $customer->company->name }}
    </div>
    <div class="col-2">
        {{-- {{ $customer->active ? 'Active' : 'Inactive' }} --}}
        {{ $customer->active }}
    </div>
</div>
@endforeach

{{-- <div class="row">
    <div class="col-6">
        <h3>Active Customers</h3>
        <ul>
            @foreach($activeCustomers as $activeCustomer)
            <li>{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->company->name }})</span></li>
@endforeach
</ul>
</div>
<div class="col-6">
    <h3>Inactive Customers</h3>
    <ul>
        @foreach($inactiveCustomers as $inactiveCustomer)
        <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{$inactiveCustomer->company->name}})</span>
        </li>
        @endforeach
    </ul>
</div>
</div> --}}
{{-- <hr>
<div class="row">
    <div class="col-12">
        @foreach($companies as $company)
        <h3>{{ $company->name }}</h3>
<ul>
    @foreach($company->customers as $customer)
    <li>{{ $customer->name }}</li>
    @endforeach
</ul>
@endforeach
</div>
</div> --}}

@endsection
