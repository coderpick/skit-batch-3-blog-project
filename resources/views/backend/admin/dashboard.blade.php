@extends('layouts.backend.master')
@section('content')
    <h2>Admin Dashboard</h2>
    <p>You are login as <strong>{{ Auth::user()->name }}</strong></p>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, iusto quia qui sapiente aliquid atque, officia
        quisquam minima velit nobis commodi impedit fugiat animi eum aspernatur eius, cumque nostrum repellat?</p>

@endsection
