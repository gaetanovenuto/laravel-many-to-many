@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Crea una nuova tecnologia</h1>
    <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" required>
        <button type="submit" class="btn btn-success mt-3">Crea</button>
    </form>
</div>
@endsection
