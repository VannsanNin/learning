<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersPhotoController extends Controller
{
    public function index()
    {
        $users = DB::table('users_photo')->paginate(10);
        return view('users_photo', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::table('users_photo')->insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'photo' => $photoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/users-photo')->with('success', 'User added successfully!');
    }
}
