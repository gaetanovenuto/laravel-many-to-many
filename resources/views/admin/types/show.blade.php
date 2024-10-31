@extends('layouts.app')

@section('page-title', $type->name)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $type->name }}
                    </h1>
                    <h6 class="text-center">
                        Creata il: {{ $type->created_at->format('d/m/Y') }}
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-end">
            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-warning">
                Modifica
            </a>
            <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="project" class="d-inline-block"
                onsubmit="return confirm('Sei sicuro di voler eliminare questa tipologia?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">
                    Elimina
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li>
                            ID: {{ $type->id }}
                        </li>
                        <li>
                            Slug: {{ $type->slug }}
                        </li>
                        <li>
                            Progetti collegati:

                            @if ($type->projects()->count() > 0)
                                <ul>
                                    @foreach ($type->projects as $project)
                                        <li>
                                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                                {{ $project->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                Nessun progetto collegato
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection