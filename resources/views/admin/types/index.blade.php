@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Types</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">Crea nuova tipologia</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.types.show', $type) }}" class="btn btn-info">Mostra</a>
                        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tipologia?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
