@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Tecnologia: {{ $technology->name }}</h1>
    <h2>Progetti che utilizzano questa tecnologia:</h2>
        <ul>
            @foreach ($technology->projects as $project)
                <li>{{ $project->name }}</li>
            @endforeach
        </ul>
    <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning">Modifica</a>
    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">Elimina</button>
    </form>
</div>
@endsection
