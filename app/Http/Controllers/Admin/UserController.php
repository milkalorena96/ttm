<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserCreateRequest;


class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admin.usuario.index', compact('users'));
        //return ['users'=>$users];
    }
    public function create()
    {
        return view('admin.usuario.create');
    }
    public function store(UserCreateRequest $request)
    {
        try{
            $user = new User($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/admin/user')->with('success', 'El registro del usuario fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el Lugar turistico, intente de nuevo!');
        }
    }
    public function update(UserEditRequest $request, User $user)
    {
        try{
            $data = $request->only('name', 'email');
            $password=$request->input('password');
            if($password)
                $data['password'] = bcrypt($password);

            $user->update($data);
            return redirect('/admin/user')->with('success', 'La actualización del usuario fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al actualizar usuario, intente de nuevo!');
        }
        /*$user = User::findOrFail($id);
        $user->fill($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/admin/user');*/
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuario.edit', compact('user'));
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin/user')->with('registro eliminado');
    }
}