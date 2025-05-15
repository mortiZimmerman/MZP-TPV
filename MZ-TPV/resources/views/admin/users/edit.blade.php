@extends('layouts.app')

@section('content')
    <h1>Editar usuario</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <label>Nombre</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"><br>
        @error('name') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"><br>
        @error('email') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Rol</label><br>
        <select name="role">
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="camarero" {{ old('role', $user->role) == 'camarero' ? 'selected' : '' }}>Camarero</option>
        </select><br>
        @error('role') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Contraseña (dejar en blanco para no cambiar)</label><br>
        <input type="password" name="password"><br>
        @error('password') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Confirmar contraseña</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Actualizar</button>
    </form>
@endsection
