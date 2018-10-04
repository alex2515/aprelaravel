<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('messages')->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        // Guardar mensaje (opcion 1) con Query Builder
        // DB::table('messages')->insert([
        //     'nombre'    => $request->input('nombre'),
        //     'email'     => $request->input('email'),
        //     'mensaje'   => $request->input('mensaje'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // Guardar mensaje (opcion 2)
        // $message = new Message; //Creando una nueva instancia del modelo Message
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('mensaje');
        // $message->save()
        // Model::unguard(); //Deshabilita la proteccion masiva de datos
        // Guardar mensaje (opcion 3)
        Message::create($request->all());
        // Message::create([
        //     'nombre'    => $request->input('nombre'),
        //     'email'     => $request->input('email'),
        //     'mensaje'   => $request->input('mensaje'),
        // ]);
        // Redireccionar 
        return redirect()->route('mensajes.create')->with('info' ,'Hemos recibido tu mensaje');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualiza 
        // $message = DB::table('messages')->where('id', $id)->update([
        //     'nombre'    => $request->input('nombre'),
        //     'email'     => $request->input('email'),
        //     'mensaje'   => $request->input('mensaje'),
        //     'updated_at' => Carbon::now()
        // ]);
        Message::findOrFail($id)->update($request->all());
        // Redirecciona
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar mensaje
        // DB::table('messages')->where('id', $id)->delete();
        Message::findOrFail($id)->delete();
        // Redireccionar 
        return redirect()->route('mensajes.index');
    }
}
