@extends('adm.layouts.app')

@section('title', 'Lista de Usuários')

@section('content')
    <h1>Usuários</h1>

    <a href="{{ route('users.create') }}">Novo Usuário</a>

    @if (session()->has('success'))
        {{ session('success') }}
    @endif

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>-</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum usuário cadastrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$users->links()}}
@endsection
