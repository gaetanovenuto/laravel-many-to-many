@extends('layouts.app')

@section('page-title', 'Tutte le tipologie')

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutte le tipologie
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100">
                + Aggiungi
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col" class="text-center"># progetti collegati</th>
                                <th scope="col" class="text-center">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->name }}</td>
                                    <td class="text-center">
                                        
                                        <div>
                                            {{ count($type->projects) }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-success btn-sm">
                                            Info
                                        </a>
                                        <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-danger btn-sm">
                                            Modifica
                                        </a>
                                        <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" class="d-inline-block"
                                            onsubmit="return confirm('Sei sicur* di voler eliminare questa tipologia')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection