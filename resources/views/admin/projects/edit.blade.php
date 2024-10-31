@extends('layouts.app')

@section('main-content')

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('admin.projects.update', $project->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome: <span class="text-danger">*</span></label>
        <input type="text" value="{{$project->name}}" class="form-control" id="name" name="name" placeholder="Inserisci il nome del progetto" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione: <span class="text-danger">*</span></label>
        <input type="textarea" value="{{$project->description}}" class="form-control" id="description" name="description" placeholder="Inserisci una descrizione per il progetto" required>
    </div>

    <div class="mb-3">
        <label for="creation_date" class="form-label">Data di Creazione: <span class="text-danger">*</span></label>
        <input type="date" value="{{$project->creation_date}}" class="form-control" id="creation_date" name="creation_date" placeholder="Inserisci la data di creazione del progetto" aria-describedby="creationHelp" required>
        <div id="creationHelp" class="form-text">Inserisci la data di creazione del progetto.</div>
    </div>

    <div class="mb-3">
        <label for="expiring_date" class="form-label">Scadenza:</label>
        <input type="date" value="{{$project->expiring_date}}" class="form-control" id="expiring_date" name="expiring_date" placeholder="Inserisci la scadenza del progetto" aria-describedby="expireHelp">
        <div id="expireHelp" class="form-text">Inserisci la scadenza del progetto.</div>
    </div>

    <div class="mb-3">
        <label for="label_tag" class="form-label">Tag:</label>
        <input type="text" value="{{$project->label_tag}}" class="form-control" id="label_tag" name="label_tag" placeholder="Inserisci un tag identificativo del progetto">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo: <span class="text-danger">*</span></label>
        <input type="number" value='{{$project->price}}' class="form-control" id="price" name="price" placeholder="Inserisci un prezzo" required max="10000" min="0">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="completed" name="completed">
        <label class="form-check-label" for="completed">Completato</label>
    </div>
        
    <button type="submit" class="btn btn-primary">Modifica</button>

</form>

@endsection