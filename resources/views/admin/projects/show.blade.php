@extends('layouts.app')

@section('main-content')
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <div>Tipologia: {{ $project->type->name }}</div>
        <div>Tecnologie:</div>
        <ul>
            @foreach ($project->technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach
        </ul>
        <div class="mb-4">
            @if($project->image)
                <img src="{{ asset('/storage/'.$project->image) }}" alt="{{ $project->name }}" class="rounded" style="height: 150px;">
            @endif
            
        </div>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
        </form>
    </div>
@endsection
