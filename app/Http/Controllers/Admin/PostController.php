<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    public function index(Request $request)
    {
        //Variable busqueda
        $busqueda = '';
        if ($request->get('busqueda')) {
            $busqueda = $request->get('busqueda');
        }
        // Exista o no exista búsqueda, los ordenamos
        $builder = Post::orderBy('id','desc');
        if ($busqueda) {
            // Si hay búsqueda, agregamos el filtro
            $builder->where('nombre', 'LIKE', '%'. $busqueda . '%');
        }
        // Al final de todo, invocamos a paginate que tendrá todos los filtros
        $posts = $builder->paginate(5);
        return view('admin.post.index', ['posts'=>$posts]);
    }
    public function create(){
        $categorias=Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.post.create',compact('categorias'));
    }
    public function store(Request $request){

            $request->validate(['imagen'=>'required|image|max:2048']);
        try{
            $post = new Post($request->all());
            
            if($request->hasFile('imagen')){

                $picture = $request->file('imagen');
                $nuevonombre = Str::slug($request->nombre).'.'.$picture->guessExtension();
                Image::make($picture->getRealPath())
                ->fit(800,450,function($constraint){ $constraint->upsize();  })
                ->save( public_path('/img/post/'.$nuevonombre));

                $post->imagen = $nuevonombre;
            }
            $post->slug    =   Str::slug($request->nombre);
            $post->save();
            return redirect('/admin/post')->with('success', 'El registro se realizó con éxito!');
        }catch
        (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el post, intente de nuevo!');
        }

    }
    public function update(Request $request,$id)
    {
        $request->validate(['imagen'=>'image|max:1024']);
        try{

            $post = Post::findOrFail($id);
            $post->fill($request->all());
            $foto_anterior     = $post->imagen;


            if($request->hasFile('imagen')){

                $rutaAnterior = public_path('/img/post/'.$foto_anterior);
                if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

                $picture = $request->file('imagen');
                $nuevonombre = Str::slug($request->nombre).'.'.$picture->guessExtension();
                Image::make($picture->getRealPath())
                ->fit(800,450,function($constraint){ $constraint->upsize();  })
                ->save( public_path('/img/post/'.$nuevonombre));

                $post->imagen = $nuevonombre;
            }
            $post->slug    =   Str::slug($request->nombre);
            $post->save();
            return redirect('/admin/post')->with('success', 'El registro se actualizó con éxito!');
        }catch
        (\Exception $e) {
            return back()->with('success', 'Hubo un error al registrar el post, intente de nuevo!');
        }
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }

    

    public function destroy($id){
        $post = Post::findOrFail($id);
        $borrar = public_path('/img/post/'.$post->imagen);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $post->delete();
        return redirect('/admin/post');
    }
}
