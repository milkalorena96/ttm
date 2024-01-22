<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Lugar_Turistico;
use App\Http\Requests\SubirFotosRest;
use App\Models\FotoRestaurante;
use Illuminate\Support\Str;
use Image;
class RestauranteController extends Controller

{
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Restaurante::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('ruc', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $restaurantes = $builder->paginate(5);
        return view('admin.restaurante.index', ['restaurantes'=>$restaurantes]);
    }
    public function create()
    {
        $lugares = Lugar_Turistico::orderBy('id', 'ASC')->pluck(
            'nombre',
            'id'
        );
        return view('admin.restaurante.create', compact('lugares'));
    }
    public function show($restau)
    {
        //$restaurante = Restaurante::find($id);
        $restaurante = Restaurante::whereSlug($restau)->first();
        return view('admin.restaurante.show', compact('restaurante'));
    }

    public function store(Request $request)
    {   
            $request->validate(['imagen'=>'required|image|max:2048','ruc'=>'required|unique:restaurantes']);
        try{
            $restaurante = new Restaurante($request->all());

            if ($request->hasFile('imagen')) {
                $picture = $request->file('imagen');
                $nuevonombre = 'restaurante' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/restaurante/' . $nuevonombre));

                $restaurante->imagen = $nuevonombre;
            }
            $restaurante->slug    =   Str::slug($request->nombre);
            $restaurante->save();
            return redirect('/admin/restaurante')->with('success', 'El registro fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el restaurante, intente de nuevo!');
        }    
    }


    public function update(Request $request, $id)
    {
        $request->validate(['imagen'=>'image|max:2048']);
        try{
            $restaurante = Restaurante::findOrFail($id);
            $restaurante->fill($request->all());
            $foto_anterior = $restaurante->imagen;

            if ($request->hasFile('imagen')) {
                $rutaAnterior = public_path('/img/restaurante/' . $foto_anterior);
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $picture = $request->file('imagen');

                $nuevonombre = 'restaurante' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/restaurante/' . $nuevonombre));

                $restaurante->imagen = $nuevonombre;
            }
            $restaurante->slug    =   Str::slug($request->nombre);
            $restaurante->save();
            return redirect('/admin/restaurante')->with('success', 'El registro se actualizó con éxito!');
        }    
        catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al actualizar datos del restaurante, intente de nuevo!');
        }
    }

    public function edit($rest)
    {
        //$restaurante = Restaurante::findOrFail($id);
        $restaurante = Restaurante::whereSlug($rest)->first();
        $lugares = Lugar_Turistico::orderBy('id', 'ASC')->pluck(
            'nombre',
            'id'
        );
        return view('admin.restaurante.edit', compact('restaurante', 'lugares'));
    }

    public function agregarFotos(SubirFotosRest $peticion)
    {
    
        foreach ($peticion->file("fotos") as $foto) {
            $fotorestaurante = new FotoRestaurante();

            $nuevonombre = 'restaurante' . '_' . $foto->getClientOriginalName();
                Image::make($foto->getRealPath())->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })->save(public_path('/img/restaurante/fotos/' . $nuevonombre));

            $fotorestaurante->ruta = str_replace('/img/restaurante/fotos/','', $nuevonombre);

            //$fotorestaurante->slug    =   Str::slug($request->ruta);

            $fotorestaurante->id_restuarante = $peticion->id;
            $fotorestaurante->save();
        }
        return back()->with('success', 'Las imagenes se registró con éxito');
        
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $borrar = public_path('/img/restaurante/' . $restaurante->imagen);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $restaurante->delete();
        return redirect('/admin/restaurante');
    }

    public function eliminar($id)
    {
        $foto = FotoRestaurante::findOrFail($id);
        $borrar = public_path('/img/restaurante/fotos/' . $foto->ruta);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $foto->delete();
        return back()->with('success', 'Foto eliminado con éxito');
    }
}
