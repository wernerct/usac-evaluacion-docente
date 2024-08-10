@extends('layouts.app')
@section('Titulo')
    Tus Evaluaciones
@endsection
@section('Contenido')

    <section class="container mx-auto mt-10">
        @livewire('UsuariosTable')

        @if ($evaluaciones->count())
            <div class=" gap-6">
                <table class="table-fixed min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="w-1/2 px-4 py-2">Descripcion</th>
                            <th class="w-1/4 px-4 py-2">Fecha de Carga</th>
                            <th class="w-1/4 px-4 py-2">Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluaciones as $index => $item)
                            <tr class="{{ $index % 2 == 0 ? 'bg-blue-100' : 'bg-white' }}">
                                <td class="border px-4 py-2">{{ $item->descripcion }}</td>
                                <td class="border px-4 py-2">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="border px-4 py-2"><a href="{{ asset('uploads') . '/' . $item->archivo }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m-6 3.75 3 3m0 0 3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No tiene evaluaciones</p>
        @endif
    </section>
@endsection
