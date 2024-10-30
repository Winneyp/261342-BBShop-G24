<!-- resources/views/auth/edit_profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Profile</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <h3>User Addresses</h3>
            @foreach ($addresses as $index => $address)
                <div class="mb-3">
                    <label for="address_line1_{{ $index }}" class="form-label">Address Line 1</label>
                    <input type="text" name="address_line1[]" class="form-control" id="address_line1_{{ $index }}" value="{{ old('address_line1.' . $index, $address->address_line1) }}">
                </div>
                <div class="mb-3">
                    <label for="address_line2_{{ $index }}" class="form-label">Address Line 2</label>
                    <input type="text" name="address_line2[]" class="form-control" id="address_line2_{{ $index }}" value="{{ old('address_line2.' . $index, $address->address_line2) }}">
                </div>
                <div class="mb-3">
                    <label for="subdistrict_{{ $index }}" class="form-label">Subdistrict</label>
                    <input type="text" name="subdistrict[]" class="form-control" id="subdistrict_{{ $index }}" value="{{ old('subdistrict.' . $index, $address->subdistrict) }}">
                </div>
                <div class="mb-3">
                    <label for="district_{{ $index }}" class="form-label">District</label>
                    <input type="text" name="district[]" class="form-control" id="district_{{ $index }}" value="{{ old('district.' . $index, $address->district) }}">
                </div>
                <div class="mb-3">
                    <label for="province_{{ $index }}" class="form-label">Province</label>
                    <input type="text" name="province[]" class="form-control" id="province_{{ $index }}" value="{{ old('province.' . $index, $address->province) }}">
                </div>
                <div class="mb-3">
                    <label for="postalcode_{{ $index }}" class="form-label">Postal Code</label>
                    <input type="number" name="postalcode[]" class="form-control" id="postalcode_{{ $index }}" value="{{ old('postalcode.' . $index, $address->postalcode) }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
