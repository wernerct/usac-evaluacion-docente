<div class="flex space-x-1">
    <a class="btn btn-green" href="{{ route('subirevaluacion', ['QCatedratico' => $id]) }}">Cargar Evaluacion</a>
    <form action="{{ route('reset') }}" method="POST">
        @csrf
        <input name="QCatedratico" type="hidden" value="{{ $id }}">
        <button class="btn btn-blue">Reiniciar Clave</button>
    </form>
</div>
