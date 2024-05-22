@extends('dashboard.guruu')

@section('body')
    <h1>Dashboard Content</h1>
    <p>Welcome, {{ auth()->user()->nama }} to the admin dashboard.</p>
@endsection
