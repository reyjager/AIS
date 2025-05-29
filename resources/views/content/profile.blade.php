@extends('layouts.app')

@section('content')
    <div>
        <!-- Profile Content -->
        <h1>Your Profile</h1>
        <!-- Your profile content here -->

        <h3>Your profile content here </h3>
        <p>Welcome, {{ $username }}!</p>
        <p>{{ $isAdmin ? 'Admin' : 'Not Admin' }}</p>

    </div>
@endsection
