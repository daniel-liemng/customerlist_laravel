<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index() {

        $customers = Customer::all();

        return view('customers.index', compact('customers'));

        // $activeCustomers = Customer::where('active', '1')->get();
        // $inactiveCustomers = Customer::where('active', '0')->get();

        // SHORT
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();
        // $companies = Company::all();

        // SHORT - USE COMPACT
        // return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));

        // dd($inactiveCustomers);

        // GET ALL CUSTOMERS
        // $customers = Customer::all();
        // dd($customers);
        // return view('internals.customers', ['customers' => $customers]);

        // GET ACTIVE AND INACTIVE CUSTOMER
        // return view('internals.customers', [
        //     'activeCustomers' => $activeCustomers,
        //     'inactiveCustomers'=> $inactiveCustomers
        // ]);
    }

    public function create() {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store() {

        // dd(request('name'));

        // Validation
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required'
        // ]);

        // dd($data);

        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        // $customer = Customer::create($data);

        Customer::create($this->validateRequest());

        return redirect('customers');
    }

    public function show(Customer $customer) {

        // create $customer obj = find customer from $customer(id)
        // $customer = Customer::find($customer);
        // dd($customer);

        // $customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required'
        // ]);

        // $customer->update($data);

        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
