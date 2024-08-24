@extends('layouts.app')
@section('Titulo')
    @if ($esadmin == 1)
        Panel de Administración
    @else
        Tus Evaluaciones
    @endif
@endsection
@section('Contenido')
    <section class="container mx-auto mt-10">
        @if ($esadmin == 1)
            @if (session('success'))
                <div class="alert flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>Contraseña reiniciada correctamente.</p>
                </div>
            @endif

            @if (session('error'))
                <div class="alert flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>Contraseña reiniciada correctamente.</p>
                </div>
            @endif
            <div>&nbsp;</div>
            <a href="{{ route('register') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+
                Agregar
                Catedrático</a>

            <div>&nbsp;</div>
            @livewire('UsuariosTable')
        @else
            <h1>Si tiene alguna duda comuniquese con su administrador de sistema</h1>
        @endif
        @if ($esadmin == 1)
            Tus Evaluaciones
        @endif
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
