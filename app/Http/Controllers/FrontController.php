<?php

namespace App\Http\Controllers;

use App\Models\Carrusel;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Correo;
use App\Models\FotoLugar;
use App\Models\Lugar_Turistico;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $visitados = Lugar_Turistico::orderBy('visitas', 'desc')
            ->take(4)
            ->get();
        $lugares = Lugar_Turistico::orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $posts = Post::orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view(
            'welcome',
            compact('carrusel', 'lugares', 'posts', 'visitados', 'comentarios')
        );
    }
    public function carrusel()
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        return view('front.carrusel', compact('carrusel'));
    }

    public function turismos()
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $categorias = Categoria::all();
        return view('front.categorias', compact('categorias', 'carrusel'));
    }

    public function categoria($categoria)
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $categoria = Categoria::whereSlug($categoria)->first();
        $categoria->increment('visitas');
        return view('front.categoria', compact('categoria', 'carrusel'));
    }

    public function lugarturistico($categoria, $lugar)
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $lugarturistico = Lugar_Turistico::whereSlug($lugar)->first();
        $lugarturistico->increment('visitas');
        return view('front.verlugares', compact('lugarturistico', 'carrusel'));
    }
    public function blog()
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $posts = Post::all();
        return view('front.posts', compact('posts', 'carrusel'));
    }

    public function ComentRegis(Request $request)
    {
        $coment = new Comentario($request->all());
        $coment->save();

        return redirect('/')->with(
            'success',
            'Su comentario se envió con éxito.'
        );
    }

    public function post($post)
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        $blogs = Post::all();
        $post = Post::whereSlug($post)->first();
        $post->increment('visitas');
        return view('front.post', compact('post', 'blogs', 'carrusel'));
    }

    public function contacto()
    {
        $carrusel = Carrusel::orderBy('orden', 'asc')->get();
        return view('front.contacto', compact('carrusel'));
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
            'subject' => 'required',
        ]);
        try {
            $email = new Correo($request->all());
            $data = [
                'nombre' => $request->input('nombre'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'mensaje' => $request->input('mensaje'),
            ];

            $correo = 'turismostingomaria@gmail.com';

            Mail::to($correo)->send(new SendMail($data));
            $email->save();
            return back()->with('success', 'Mensaje enviado exitosamente!');
        } catch (\Exception $e) {
            return back()->with(
                'success',
                'Hubo un error al enviar el mensaje, intente de nuevo!'
            );
        }
    }
}
