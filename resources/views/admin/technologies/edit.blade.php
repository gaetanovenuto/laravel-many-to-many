@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Modifica Tecnologia: {{ $technology->name }}</h1>
    <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome:</label>
        <input type="text" name="name" value="{{ $technology->name }}" class="form-control" required>
        <button type="submit" class="btn btn-success mt-3">Aggiorna</button>
    </form>
</div>
@endsection
