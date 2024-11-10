@extends('layouts.app')

@section('main-content')
    <div class="container">
        <h1>Crea un nuovo progetto</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" required>
            
            <label>Tipologia:</label>
            <select name="type_id" class="form-control">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <label>Tecnologie:</label>
            <select name="technologies[]" class="form-control" multiple>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                @endforeach
            </select>

            <label>Immagine:</label>
            <input type="text" name="image" class="form-control">
            <button type="submit" class="btn btn-success mt-3">Crea</button>
        </form>
    </div>
@endsection
