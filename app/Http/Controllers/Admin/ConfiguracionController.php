<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Illuminate\Support\Str;
use Image;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $registro = Configuracion::find(1);
        return view('admin.configuracion.index', compact('registro'));
    }

    public function update(Request $request, $id)
    {
            $request->validate([
            'urllogo'=>'image|max:1024',
            'urlfavicon'=>'image|max:1024',
            'urlfoto'=>'image|max:1024'
            ]);
        try{
            $registro = Configuracion::findOrFail($id);
            $registro->fill($request->all());

            $logo_anterior = $registro->urllogo;
            $favicon_anterior = $registro->urlfavicon;
            $foto_anterior = $registro->urlfoto;

            if ($request->hasFile('urlfoto')) {
                $rutaAnterior = public_path('/img/configuracion/' . $foto_anterior);
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $imagen = $request->file('urlfoto');
                $nuevonombre =
                    Str::slug($request->razonsocial) .
                    '_foto.' .
                    $imagen->guessExtension();
                Image::make($imagen->getRealPath())
                    ->fit(1200, 400, function ($constraint) {
                        $constraint->upsize();
                    })
                    ->save(public_path('/img/configuracion/' . $nuevonombre));

                $registro->urlfoto = $nuevonombre;
            }

            if ($request->hasFile('urlfavicon')) {
                $rutaAnterior = public_path(
                    '/img/configuracion/' . $favicon_anterior
                );
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $imagen = $request->file('urlfavicon');
                $nuevonombre =
                    Str::slug($request->razonsocial) .
                    '_favicon.' .
                    $imagen->guessExtension();
                Image::make($imagen->getRealPath())
                    ->resize(16, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('/img/configuracion/' . $nuevonombre));

                $registro->urlfavicon = $nuevonombre;
            }

            if ($request->hasFile('urllogo')) {
                $rutaAnterior = public_path('/img/configuracion/' . $logo_anterior);
                if (file_exists($rutaAnterior)) {
                    unlink(realpath($rutaAnterior));
                }

                $imagen = $request->file('urllogo');
                $nuevonombre =
                    Str::slug($request->razonsocial) .
                    '_logo.' .
                    $imagen->guessExtension();
                Image::make($imagen->getRealPath())
                    ->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('/img/configuracion/' . $nuevonombre));

                $registro->urllogo = $nuevonombre;
            }

            $registro->save();
            return redirect()->route('configuracion.index')->with('success', 'La actualización fue exitoso!');
        }catch (\Exception $e) {
            return back()->with('success', 'Hubo un error al actualizar, intente de nuevo!');
        }
    }
}