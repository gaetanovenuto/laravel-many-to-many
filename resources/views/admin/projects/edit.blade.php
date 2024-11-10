@extends('layouts.app')

@section('main-content')
    <div class="container">
        <h1>Modifica progetto: {{ $project->name }}</h1>
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Nome:</label>
            <input type="text" name="name" value="{{ $project->name }}" class="form-control" required>

            <label>Tipologia:</label>
            <select name="type_id" class="form-control">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>

            <label>Tecnologie:</label>
            <select name="technologies[]" class="form-control" multiple>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}" {{ $project->technologies->contains($technology) ? 'selected' : '' }}>{{ $technology->name }}</option>
                @endforeach
            </select>

            <label>Immagine:</label>
            <input type="text" name="image" value="{{ $project->image }}" class="form-control">
            <button type="submit" class="btn btn-success mt-3">Aggiorna</button>
        </form>
    </div>
@endsection
