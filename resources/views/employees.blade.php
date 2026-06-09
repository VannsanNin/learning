{{-- resources/views/employees.blade.php --}}

@extends('layouts.master')

@section('title', 'DASHBOARD NIN VANNSAN')

@section('header')
    <div class="bg-dark text-white p-3">
        <h1>My Website NIN VANNSAN</h1>
    </div>
@endsection

@section('content')
    <h2>Welcome</h2>
    <p>This is the home page.</p>
@endsection

@section('css')
    <style>
        h2 {
            color: blue;
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Home page loaded');
    </script>
@endsection