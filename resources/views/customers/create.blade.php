@extends('layout')

@section('title', 'Add New Customer')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Add New Customer</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/customers" method="POST" class="mb-3">

            @include('customers.form')

            <button type="submit" class="btn btn-block btn-primary mt-4">Add Customer</button>


        </form>
    </div>
</div>



@endsection
