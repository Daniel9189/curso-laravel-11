@extends('adm.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <h2>Editar Usuário {{ $user->name }}</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('put')
        @include('adm.users.partials.form')
    </form>

@endsection
