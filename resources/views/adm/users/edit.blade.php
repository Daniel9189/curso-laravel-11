@extends('adm.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <h2>Editar Usuário {{ $user->name }}</h2>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="text", name="_method", value="PUT">
        <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
        <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}">
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>

@endsection
