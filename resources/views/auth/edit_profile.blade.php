<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .edit-container {
            background-color: #ffffff; /* White background for edit card */
            border-radius: 8px; /* Rounded corners */
            padding: 30px; /* Spacing inside the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h1, h3 {
            color: #343a40; /* Dark gray color for headers */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="edit-container">
            <h1 class="text-center mb-4">Edit Profile</h1>

            <form action="{{ route('profile.update') }}" method="POST">
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

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>

                <button type="submit" class="btn btn-success">Update Profile</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
