<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequestTest;

class UserControllerTest extends Controller
{
    public function index()
    {
        $users = User::paginate(100);//User::all();

        return view('adm.users.index', compact('users'));

    }

    public function create() {

        return view('adm.users.create');

    }

    public function store(StoreUserRequestTest $request) {

        User::create($request->all());
        return redirect()
            ->route('users.index')
            ->with('success','Usuário criado com sucesso!');

    }
}
