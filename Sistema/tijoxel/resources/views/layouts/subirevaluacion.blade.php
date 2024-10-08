@extends('layouts.app')
@section('Titulo')
    Subir Evaluación a Catedrático
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('Contenido')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('guardasubirevaluacion') }}" method="POST">
                @csrf
                {{-- <div class="mb-5">
                    <label for="codigocatedratico" class="mb-2 block uppercase text-gray-500 font-bold">Codigo
                        Catedratico</label>
                    <input id="codigocatedratico" name="codigocatedratico" type="text" placeholder="codigocatedratico"
                        class="border p-3 w-full rounded-lg @error('codigocatedratico') border-red-500 @enderror"
                        value="{{ old('codigocatedratico') }}">
                    @error('codigocatedratico')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="mb-5">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-blue-800 dark:border-blue-700 dark:hover:bg-blue-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Codigo Catedrático: {{ $catedratico[0]->codigocatedratico }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Nombre: {{ $catedratico[0]->name }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Usuario: {{ $catedratico[0]->username }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">correo: {{ $catedratico[0]->email }}</p>
                    </a>
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="descripcion"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                        value="{{ old('descripcion') }}">
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="archivo" type="hidden" value="{{ old('archivo') }}">

                    @error('archivo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="estado" type="hidden" value="1">

                    @error('estado')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="catedratico_id" type="hidden" value="{{ $catedratico[0]->id }}">

                    @error('catedratico_id')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Subir Evaluación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
        <div class="md:w-1/2 px-10">
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
    </div>
@endsection
