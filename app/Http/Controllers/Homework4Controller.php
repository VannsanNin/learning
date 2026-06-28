<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homework4Controller extends Controller
{
    public function index()
    {
        return view('homework4');
    }

    public function products()
    {
        $products = DB::table('products')->get();
        return view('homework41', compact('products'));
    }

    public function create()
    {
        return view('homework41_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/homework41')->with('success', 'Product created successfully!');
    }
}
