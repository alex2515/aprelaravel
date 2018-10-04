<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('example', ['only' => ['home']]);
	}
	public function home()
	{
		// return response(['key' => ['Value', ['value1' => 'subvalor']]], 201)
		// 		->header('X-TOKEN', 'secret')
		// 		->header('X-TOKEN2', 'secret2')
		// 		->cookie('X-COOKIE', 'cookie');

		return view('home');
	}
	public function contacto()
	{
		return view('contacto');
	}
	public function mensajes(CreateMessageRequest $request)
	{
		$data = $request->all();
		// return response()->json(['data' => $data], 201)
		// 				->header('TOKEN', 'secret');
		// return redirect()
		// 				->route('contactos')
		// 				->with('info', 'Tu mensaje personalizado a sido enviado correctamente :)');
		return back()->with('info', 'Tu mensaje personalizado a sido enviado correctamente :)');
		// if ($request->has('nombre')) {
		// 	return "Si Tiene nombre. Es " . $request->input('nombre');
		// }
		// return "No tiene nombre";
	}
	public function saludo($nombre = 'Invitado')
	{
		// return view('saludo', ['nombre' => $nombre]);
		// return view('saludo')->with(['nombre' => $nombre]);
		$html = "<h2>Contenido html</h2>"; // suponemos que fue ingresado por formulario
		$script = "<script>alert('Problema XSS - Cross Site Scripting!')</script>"; // suponemos que fue ingresado por formulario
		$consolas = [
			'PlayStation 4',
			'Xbox',
			'Nintendo'
		];
		return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
	}

}
