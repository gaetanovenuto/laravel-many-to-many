@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Tipologia: {{ $type->name }}</h1>
    <h2>Progetti associati:</h2>
        <ul>
            @foreach ($type->projects as $project)
                <li>{{ $project->name }}</li>
            @endforeach
        </ul>
    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning">Modifica</a>
    <form action="{{ route('admin.types.destroy', $type) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tipologia?')">Elimina</button>
    </form>
</div>
@endsection
