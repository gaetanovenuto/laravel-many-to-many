@extends('layouts.app')

@section('main-content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea nuovo progetto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipologia</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->type->name }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info">Vedi</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
