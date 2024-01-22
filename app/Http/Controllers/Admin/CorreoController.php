<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Correo;

class CorreoController extends Controller
{
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Correo::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('nombre', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $correos = $builder->paginate(5);
        return view('admin.post.correo', ['correos'=>$correos]);
    }

    public function show($id)
    {
        $correo = Correo::find($id);

        return view('admin.post.show', compact('correo'));
    }
    public function destroy($id)
    {
        $correo = Correo::findOrFail($id);
        $correo->delete();
        return redirect('/correo');
    }
}
