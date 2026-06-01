@extends('layouts.master')

@section('title')
Home Page
@endsection


@section('css')
<style>
    h1 {
        color: blue;
    }
</style>
@endsection


@section('header')
<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand">
        Homework 2
    </span>
</nav>
@endsection


@section('content')

<h1>Welcome to Home Page</h1>

<p>This page extends master.blade.php</p>

@endsection


@section('js')

<script>
    console.log("Page Loaded");
</script>

@endsection