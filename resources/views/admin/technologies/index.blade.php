@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Technologies</h1>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary mb-3">Crea nuova tecnologia</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-info">Mostra</a>
                        <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
