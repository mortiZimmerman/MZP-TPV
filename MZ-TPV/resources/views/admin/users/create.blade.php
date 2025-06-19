@extends('layouts.app')
@include('admin.partials.header')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">
@section('content')
    <div class="form-container">
        <h1>Add new User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" class="styled-form">
            @csrf

            <div class="form-group">
                <label for="name" ></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter full name" required>
                @error('name') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="email"></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email address" required  >
                @error('email') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
              
                <div class="role-buttons">
                    <label><input type="radio" class="formRadio" name="role" value="waiter" {{ old('role') == 'waiter' ? 'checked' : '' }}> Waiter</label>
                    <label><input type="radio" class="formRadio2" name="role" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}> Admin</label>
                </div>
                @error('role') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password"></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required >
                @error('password') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation"></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required >
            </div>

            <div class="form-actions">
                
                <button type="submit" class="submit-btn">Submit</button>
                <a href="{{ route('admin.users.index') }}" ><button type="button" class="btn-cancel">Cancel</button></a>
       
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/userForm.css') }}">
@endpush
