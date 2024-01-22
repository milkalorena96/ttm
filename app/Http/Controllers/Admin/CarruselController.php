<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrusel;
use Image;

class CarruselController extends Controller
{
    public function index(Request $request){
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Carrusel::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('descripcion', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $carrusels = $builder->paginate(5);
        return view('admin.carrusel.index', ['carrusels'=>$carrusels]);
    }
    public function create(){
        return view('admin.carrusel.create');
    }

    public function store(Request $request){

        $request->validate(['imagen'=>'required|image|max:2048']);
        try{
            $carrusel = new carrusel($request->all());
            
            if($request->hasFile('imagen')){

                $picture = $request->file('imagen');
                $nuevonombre = 'turismo'.time().'.'.$picture->guessExtension();
                Image::make($picture->getRealPath())
                ->fit(2048,1180,function($constraint){ $constraint->upsize();  })
                ->save( public_path('/img/carrusel/'.$nuevonombre));

                $carrusel->imagen = $nuevonombre;
            }
            $carrusel->save();
            return redirect('/admin/carrusel')->with('success', 'El registro fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar carrusel, intente de nuevo!');
        }
}
    public function update(Request $request,$id){

        $request->validate(['imagen'=>'image|max:2048']);
            try{

                $carrusel = Carrusel::findOrFail($id);
                $carrusel->fill($request->all());
                $foto_anterior     = $carrusel->imagen;

                if($request->hasFile('imagen')){

                    $rutaAnterior = public_path('/img/carrusel/'.$foto_anterior);
                    if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

                    $picture = $request->file('imagen');
                    
                    $nuevonombre = 'turismo'.time().'.'.$picture->guessExtension();
                    Image::make($picture->getRealPath())
                    ->fit(2048,1180,function($constraint){ $constraint->upsize();  })
                    ->save( public_path('/img/carrusel/'.$nuevonombre));

                    $carrusel->imagen = $nuevonombre;
                }
            
                $carrusel->save();
                return redirect('/admin/carrusel')->with('success', 'La actualización fue exitosa!');
            }catch (\Exception $e) {
                return back()->with('success', 'Hubo un error al actualizar carrusel, intente de nuevo!');
            }
    }

    public function edit($id){
        $carrusel = Carrusel::findOrFail($id);
        return view('admin.carrusel.edit',compact('carrusel'));
    }

    public function destroy($id){
        $carrusel = Carrusel::findOrFail($id);
        $borrar = public_path('/img/carrusel/'.$carrusel->imagen);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $carrusel->delete();
        return redirect('/admin/carrusel');
    }
}
