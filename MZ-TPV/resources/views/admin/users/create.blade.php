@extends('layouts.app')
@include('admin.partials.header')

@section('content')
    <div class="form-container">
        <h1>Add new User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" class="styled-form">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Role</label>
                <div class="role-buttons">
                    <label><input type="radio" name="role" value="waiter" {{ old('role') == 'waiter' ? 'checked' : '' }}> Waiter</label>
                    <label><input type="radio" name="role" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}> Admin</label>
                </div>
                @error('role') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                @error('password') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.users.index') }}" class="cancel-btn">Cancel</a>
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/userForm.css') }}">
@endpush
