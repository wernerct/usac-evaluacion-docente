<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>USAC - @yield('Titulo')</title>
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/png">
    @vite('resources/css/app.css')
    <script src="asset('js/app.js')" defer></script>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <div class="grid grid-cols-3 gap-4">
                <div class="container p-1">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logotipo" width="90" height="90">
                </div>
                <h1 class="text-3xl font-black p-1">Universidad de San Carlos</h1>
                <div class="">
                    <nav class="p-1 flex gap-2 ">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="#">login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear
                            Cuenta</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('Titulo')
        </h2>
        @yield('Contenido')
    </main>
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        USAC - Todos los derechos reservados @php
            echo date('Y');
        @endphp {{ now()->year }}
    </footer>
</body>

</html>
