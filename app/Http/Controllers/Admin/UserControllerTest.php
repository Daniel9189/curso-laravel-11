<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequestTest;
use Illuminate\Http\Request;

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

    public function edit(string $id) {
        // $user = User::where('id', '=', $id)->first();
        // $user = User::where('id', $id)->first(); //firstOrFail();
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')
                ->with('message', 'Usuário não encontrado');
        }

        return view('adm.users.edit', compact('user'));
    }

    public function update(Request $request, string $id) {
        if (!$user = User::find($id)) {
            return back()
                ->with('message', 'Usuário não encontrado');
        }

        $user->update($request->only([
            'name',
            'email'
        ]));

        return redirect()
            ->route('users.index')
            ->with('success','Usuário atualizado com sucesso!');
    }
}
