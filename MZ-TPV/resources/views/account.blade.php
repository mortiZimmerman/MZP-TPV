@extends('layouts.app')
@if(auth()->user()->role === 'admin')
    @include('admin.partials.header')
@elseif(auth()->user()->role === 'waiter')
    @include('waiter.partials.header')
@endif

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4" style="max-width:420px;margin:auto;">
        <div class="text-center mb-3">
            <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_para_loop_aadtyw.png"
                 alt="Avatar"
                 style="width:80px;height:80px;object-fit:cover;border-radius:50%;">
            <h3 class="mt-2"> Welcome: {{ ucfirst(auth()->user()->role) }}</h3>
            <p class="text-muted mb-1">Email: {{ auth()->user()->email }}</p>
            <span class="badge bg-info">UserName:  {{ auth()->user()->name }}</span>
        </div>
        <hr>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 mb-2">Close session</button>
        </form>
    </div>
</div>
@endsection
