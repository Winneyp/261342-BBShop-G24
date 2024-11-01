<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress; // Ensure you import your UserAddress model

class ProfileController extends Controller
{
    public function show(){ 
        $user = Auth::user();
        $address = $user->address; // Assuming you have a relationship set up
        
        return view('auth.profile', compact('user', 'address'));
    }

  
    public function edit()
    {
        $user = Auth::user();
        return view('auth.edit_profile', compact('user'));
    }

    // Update the user's profile
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->sex = $request->input('sex'); // This is now being updated
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }


    

}