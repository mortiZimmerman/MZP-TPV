@extends('layouts.app')
@include('admin.partials.header')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">
@section('content')
    <div class="form-container">
        <h1>Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="styled-form">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-left:-17rem;">
                <label for="name"></label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Enter full name" required>
                @error('name') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group" style="margin-left:-17rem;">
                <label for="email"></label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Enter email address" required>
                @error('email') <small class="error">{{ $message }}</small> @enderror
            </div>

     <div class="form-group">
    <label></label>
    <div class="role-buttons">
        <label>
            <input type="radio" name="role" value="waiter" class="formRadio" {{ old('role', $user->role) == 'waiter' ? 'checked' : '' }}> Waiter
        </label>
        <label>
            <input type="radio" name="role" value="admin" class="formRadio2" {{ old('role', $user->role) == 'admin' ? 'checked' : '' }}> Admin
        </label>
    </div>
    @error('role') <small class="error">{{ $message }}</small> @enderror
</div>


            <div class="form-group" style="margin-left:-17rem;">
                <label for="password"></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                @error('password') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group" style="margin-left:-17rem;">
                <label for="password_confirmation"></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password">
            </div>

            <div class="form-actions" style="margin-left:-17rem;">
               
                <button type="submit" class="submit-btn">Update</button>
                <a href="{{ route('admin.users.index') }}" ><button type="button" class="btn-cancel">Cancel</button></a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/userForm.css') }}">
@endpush
