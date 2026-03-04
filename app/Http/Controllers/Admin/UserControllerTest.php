<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequestTest;
use App\Http\Requests\UpdateUserRequestTest;

class UserControllerTest extends Controller
{
    public function index()
    {
        $users = User::paginate(30);//User::all();

        return view('adm.users.index', compact('users'));

    }

    public function create() {

        return view('adm.users.create');

    }

    public function store(StoreUserRequestTest $request) {

        User::create($request->validated());
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

    public function update(UpdateUserRequestTest $request, string $id) {
        if (!$user = User::find($id)) {
            return back()
                ->with('message', 'Usuário não encontrado');
        }

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success','Usuário atualizado com sucesso!');
    }
}
