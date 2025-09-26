@extends('layouts.app')

@section('content')

    @auth
    <p>you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    @else
    <h1 class="text-center font-bold">Register Page</h1>
    <form method="POST" action="/register">
        @csrf
        <label class="block mb-2">Name</label>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button>Register</button>
    </form>
    @endauth

@endsection