<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress; // Ensure you import your UserAddress model

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // Get user addresses (assuming you have set up the relationship)
        $addresses = $user->addresses; // Adjust based on your actual relationship method
        
        return view('auth.profile', compact('user', 'addresses'));
    }

  
    public function edit()
    {
        $user = auth()->user(); // Get the authenticated user
        $addresses = $user->addresses; // Get the addresses associated with the user

        return view('auth.edit_profile', compact('user', 'addresses'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $addresses = $user->addresses; // Retrieve the addresses associated with the user

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address_line1.*' => 'required|string|max:255',
            'subdistrict.*' => 'required|string|max:255',
            'district.*' => 'required|string|max:255',
            'province.*' => 'required|string|max:255',
            'postalcode.*' => 'required|numeric',
        ]);

        // Update user info
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Update user addresses
        foreach ($addresses as $index => $address) {
            $address->address_line1 = $request->address_line1[$index];
            $address->address_line2 = $request->address_line2[$index] ?? null; // Handle optional address line 2
            $address->subdistrict = $request->subdistrict[$index];
            $address->district = $request->district[$index];
            $address->province = $request->province[$index];
            $address->postalcode = $request->postalcode[$index];
            $address->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}