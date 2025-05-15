@extends('layouts.app')

@section('content')
    <h1>Crear usuario</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <label>Nombre</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>
        @error('email') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Rol</label><br>
        <select name="role">
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="camarero" {{ old('role') == 'camarero' ? 'selected' : '' }}>Camarero</option>
        </select><br>
        @error('role') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Contraseña</label><br>
        <input type="password" name="password"><br>
        @error('password') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Confirmar contraseña</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Crear</button>
    </form>
@endsection
