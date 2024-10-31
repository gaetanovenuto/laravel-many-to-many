@extends('layouts.app')

@section('main-content')

@if ($errors->any())
    <div class="alert alert-warning mb-4">
        <ul class="mb-2">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.projects.store')  }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="name" class="form-label">
            Nome: <span class="text-danger">*</span>
        </label>
        <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="Inserisci il nome del progetto" required>
    </div>

    <div class="mb-4">
        <label for="description" class="form-label">
            Descrizione: <span class="text-danger">*</span>
        </label>
        <input type="textarea" value="{{ old('description') }}" class="form-control" id="description" name="description" placeholder="Inserisci una descrizione per il progetto" required>
    </div>


    <div class="mb-4">
        <label for="expiring_date" class="form-label">
            Scadenza:
        </label>
        <input type="date" value="{{ old('expiring_date') }}" class="form-control" id="expiring_date" name="expiring_date" placeholder="Inserisci la scadenza del progetto" aria-describedby="expireHelp">
        <div id="expireHelp" class="form-text">
            Inserisci la scadenza del progetto.
        </div>
    </div>

    <div class="mb-4">
        <label for="label_tag" class="form-label">Tag:</label>
        <input type="text" value="{{ old('label_tag') }}" class="form-control" id="label_tag" name="label_tag" placeholder="Inserisci il tag">
    </div>

    <div class="mb-4">
        <label for="price" class="form-label">
            Prezzo: <span class="text-danger">*</span>
        </label>
        <input type="number" value='{{ old('price', 0)}}' class="form-control" id="price" name="price" placeholder="Inserisci un prezzo" required max="10000" min="0">
    </div>
        
    <button type="submit" class="btn btn-primary">
        Crea progetto
    </button>

</form>

@endsection