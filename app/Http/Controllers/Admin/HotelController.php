<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Str;
use App\Models\Lugar_Turistico;
use App\Models\FotoHotel;
use App\Http\Requests\SubirFotosHotel;

use Image;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Hotel::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('ruc', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $hoteles = $builder->paginate(5);
        return view('admin.hotel.index', ['hoteles'=>$hoteles]);
    }
    public function create()
    {
        $lugares = Lugar_Turistico::orderBy('id', 'ASC')->pluck(
            'nombre',
            'id'
        );
        return view('admin.hotel.create', compact('lugares'));
    }
    public function show($hot)
    {
        //$hotel = Hotel::find($id);
        $hotel = Hotel::whereSlug($hot)->first();
        return view('admin.hotel.show', compact('hotel'));
    }
    public function store(Request $request)
    {   
            $request->validate(['imagen'=>'required|image|max:2048','ruc'=>'required|unique:hoteles']);
        try{
            $hotel = new Hotel($request->all());

            if ($request->hasFile('imagen')) {
                $picture = $request->file('imagen');
                $nuevonombre = 'hotel' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/hotel/' . $nuevonombre));

                $hotel->imagen = $nuevonombre;
            }
            $hotel->slug    =   Str::slug($request->nombre);
            $hotel->save();
            return redirect('/admin/hotel')->with('success', 'El registro fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el Hotel, intente de nuevo!');
        }    
    }
    public function update(Request $request, $id)
    {
        $request->validate(['imagen'=>'image|max:2048']);
        try{
            $hotel = Hotel::findOrFail($id);
            $hotel->fill($request->all());
            $foto_anterior = $hotel->imagen;

            if ($request->hasFile('imagen')) {
                $rutaAnterior = public_path('/img/hotel/' . $foto_anterior);
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $picture = $request->file('imagen');

                $nuevonombre = 'hotel' . time() . '.' . $picture->guessExtension();
                Image::make($picture->getRealPath())
                    ->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/hotel/' . $nuevonombre));

                $hotel->imagen = $nuevonombre;
            }
            $hotel->slug    =   Str::slug($request->nombre);
            $hotel->save();
            return redirect('/admin/hotel')->with('success', 'El registro se actualizó con éxito!');
        }    
        catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al actulizar datos del Hotel, intente de nuevo!');
        }
    }

    public function edit($hot)
    {
        //$hotel = Hotel::findOrFail($id);
        $hotel = Hotel::whereSlug($hot)->first();
        $lugares = Lugar_Turistico::orderBy('id', 'ASC')->pluck(
            'nombre',
            'id'
        );
        return view('admin.hotel.edit', compact('hotel', 'lugares'));
    }
    public function agregarFotos(SubirFotosHotel $peticion)
    {
    
        foreach ($peticion->file("fotos") as $foto) {
            $fotohotel = new FotoHotel();

            $nuevonombre = 'hotel' . '_' . $foto->getClientOriginalName();
                Image::make($foto->getRealPath())->fit(2048,1180, function ($constraint) {
                        $constraint->upsize();
                    })->save(public_path('/img/hotel/fotos/' . $nuevonombre));

            $fotohotel->ruta = str_replace('/img/hotel/fotos/','', $nuevonombre);

            //$fotorestaurante->slug    =   Str::slug($request->ruta);

            $fotohotel->id_hotel = $peticion->id;
            $fotohotel->save();
        }
        return back()->with('success', 'Las imagenes se registró con éxito');
        
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $borrar = public_path('/img/hotel/' . $hotel->imagen);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $hotel->delete();
        return redirect('/admin/hotel');
    }
    public function eliminar($id)
    {
        $foto = FotoHotel::findOrFail($id);
        $borrar = public_path('/img/hotel/fotos/' . $foto->ruta);
        if (file_exists($borrar)) {
            unlink(realpath($borrar));
        }
        $foto->delete();
        return back()->with('success', 'Foto eliminado con éxito');
    }
}