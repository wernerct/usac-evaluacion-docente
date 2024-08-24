@extends('layouts.app')
@section('Titulo')
    NUEVA CONTRASEÑA
@endsection
@section('Contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('change') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Tu Contraseña"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('password') }}">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir
                        Nueva Contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Cambiar clave"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
