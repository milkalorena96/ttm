<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lugar_Turistico;
use App\Models\FotoLugar;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ValidarLugarRequest;
use App\Http\Requests\SubirFotosLugarRequest;
use Illuminate\Support\Str;
use Session;

use Image;

class LugarturisticoController extends Controller
{
    public function index(Request $request)
    {
        /*if(!empty(Session::get('categoria_id'))){
            $lugares = Lugar_Turistico::whereCategoria_id(Session::get('categoria_id'))->get();
            return view("admin.lugar_turistico.index",compact('lugares'));
        }*/
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }

        if(!empty(Session::get('categoria_id'))){
            $builder=Lugar_Turistico::whereCategoria_id(Session::get('categoria_id'));

            // Exista o no exista búsqueda, los ordenamos
            $builder->orderBy('id','desc');
            if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('nombre', 'LIKE', '%'. $busqueda . '%');
            }
            $lugares = $builder->paginate(3);
            return view('admin.lugar_turistico.index', compact('lugares'));
        }
    }

    public function create()
    {
        return view('admin.lugar_turistico.create');
    }
    public function show($lugar)
    {
        //$lugar = Lugar_Turistico::find($id);
        $lugar = Lugar_Turistico::whereSlug($lugar)->first();
        return view('admin.lugar_turistico.show', compact('lugar'));
    }

    public function store(ValidarLugarRequest $request)
    {
        try{
            $lugar = new Lugar_Turistico($request->all());
            if ($request->hasFile('imagen')) {
                $picture = $request->file('imagen');
                $nuevonombre = 'turismo' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/lugar_turistico/' . $nuevonombre));

                $lugar->imagen = $nuevonombre;
            }
            $lugar->categoria_id     =   Session::get('categoria_id');
            
            $lugar->slug    =   Str::slug($request->nombre);
            $lugar->save();
            return redirect('/admin/lugares')->with('success', 'El registro fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el Lugar turistico, intente de nuevo!');
        }
    }
    public function update(ValidarLugarRequest $request, $id)
    {
        try{
            $lugar = Lugar_Turistico::findOrFail($id);
            $lugar->fill($request->all());
            if ($request->hasFile('imagen')) {
                $picture = $request->file('imagen');
                $nuevonombre = 'turismo' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/lugar_turistico/' . $nuevonombre));

                $lugar->imagen = $nuevonombre;
            }
            
            $lugar->slug    =   Str::slug($request->nombre);

            $lugar->save();
            return redirect('/admin/lugares')->with('success', 'El registro se actualizó con éxito!');
        }catch
        (\Exception $e) {
            return back()->with('success', 'Hubo un error al actualizar el Lugar turistico, intente de nuevo!');
        }
    }

    public function edit($lugaredit)
    {
        //$lugar = Lugar_Turistico::findOrFail($id);
        $lugar = Lugar_Turistico::whereSlug($lugaredit)->first();
        return view('admin.lugar_turistico.edit', compact('lugar'));
    }

    public function agregarFotos(SubirFotosLugarRequest $peticion)
    {
    
        foreach ($peticion->file("fotos") as $foto) {
            $fotoLugar = new FotoLugar();

            $nuevonombre = 'turismo' . '_' . $foto->getClientOriginalName();
                Image::make($foto->getRealPath())->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })->save(public_path('/img/lugar_turistico/fotos/' . $nuevonombre));

            $fotoLugar->ruta = str_replace('/img/lugar_turistico/fotos/','', $nuevonombre);

            //$fotoLugar->slug    =   Str::slug($request->ruta);

            $fotoLugar->id_lugar = $peticion->id;
            $fotoLugar->save();
        }
        return back()->with('success', 'Las imagenes se registró con éxito');
        
    }

    public function destroy($id)
    {
        $lugar = Lugar_Turistico::findOrFail($id);
        $borrar = public_path('/img/lugar_turistico/' . $lugar->imagen);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $lugar->delete();
        return redirect('/admin/lugares')->with('success', 'Registro eliminado con éxito');
    }


    public function eliminar($id)
    {
        $foto = FotoLugar::findOrFail($id);
        $borrar = public_path('/img/lugar_turistico/fotos/' . $foto->ruta);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $foto->delete();
        return back()->with('success', 'Foto eliminado con éxito');
    }
    
}