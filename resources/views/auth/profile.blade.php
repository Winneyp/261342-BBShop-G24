<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for clarity */
        }
        .container {
            background-color: #ffffff; /* White background for the profile container */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .gender-icon {
            width: 24px;
            height: 24px;
            cursor: pointer; /* Change cursor to pointer for icons */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>User Profile</h1>
        
        <h3>User Data</h3>
        <p>Name: {{ $user->name }}</p>
        <p>Birthdate: <span id="birthdate">{{ $user->birthday }}</span></p>
        <p>Email: {{ $user->email }}</p>
        <p>
            Sex: 
            <span id="sex">
                @if($user->sex == 'male')
                    <img src="{{ asset('path/to/male-icon.png') }}" class="gender-icon" id="maleIcon" alt="Male" onclick="toggleGender('male')">
                    <img src="{{ asset('path/to/female-icon.png') }}" class="gender-icon d-none" id="femaleIcon" alt="Female" onclick="toggleGender('female')">
                @else
                    <img src="{{ asset('path/to/male-icon.png') }}" class="gender-icon d-none" id="maleIcon" alt="Male" onclick="toggleGender('male')">
                    <img src="{{ asset('path/to/female-icon.png') }}" class="gender-icon" id="femaleIcon" alt="Female" onclick="toggleGender('female')">
                @endif
            </span>
        </p>

        <h3>Address</h3>
        @if($address)
            <p>{{ $address->street }}, {{ $address->city }}, {{ $address->state }}, {{ $address->postal_code }}</p>
        @else
            <p>No address provided.</p>
        @endif

        <h3>Edit Profile</h3>
        <form method="POST" action="{{ route('profile.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" required>
            </div>
            <input type="hidden" id="sexInput" name="sex" value="{{ $user->sex }}">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <script>
        function toggleGender(selectedSex) {
            const maleIcon = document.getElementById('maleIcon');
            const femaleIcon = document.getElementById('femaleIcon');
            const sexInput = document.getElementById('sexInput');

            if (selectedSex === 'male') {
                maleIcon.classList.remove('d-none');
                femaleIcon.classList.add('d-none');
                sexInput.value = 'male';
            } else {
                femaleIcon.classList.remove('d-none');
                maleIcon.classList.add('d-none');
                sexInput.value = 'female';
            }
        }
    </script>
</body>
</html>
