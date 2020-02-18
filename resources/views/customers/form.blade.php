<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $customer->name }}">
    <div>{{ $errors -> first('name') }}</div>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ?? $customer->email }}">
    <div>{{ $errors -> first('email') }}</div>
</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
        <option value='{{ $activeOptionKey }}' {{ $customer->active == $activeOptionValue ? 'selected' : null }}>
            {{ $activeOptionValue }}</option>
        @endforeach
        {{-- <option value="1" {{ $customer->active == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $customer->active == 'Inactive' ? 'selected' : '' }}>Inactive</option> --}}
    </select>
</div>

<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
        <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>
            {{ $company->name }}</option>
        @endforeach
    </select>
</div>

@csrf
