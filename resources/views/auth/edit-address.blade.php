@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Address</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('address.update', $address->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="address_line" class="form-label">Address Line</label>
            <input type="text" class="form-control" name="address_line" id="address_line" value="{{ $address->address_line }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ $address->city }}" required>
        </div>

        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" name="state" id="state" value="{{ $address->state }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ $address->postal_code }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Address</button>
    </form>
</div>
@endsection