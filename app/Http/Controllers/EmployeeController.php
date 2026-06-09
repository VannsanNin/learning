<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees=DB::table("employees")->paginate(5);
        return view("employees", compact("employees"));
    }
}
