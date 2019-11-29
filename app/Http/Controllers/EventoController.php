<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Mail\eventoAprobado;
use App\Voluntarios;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos= Evento::with('voluntarios:id,nombre')->paginate(5);
        return view('eventos.eventosIndex', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $voluntarios = Voluntarios::pluck('nombre', 'id');
        return view('eventos.eventoForm', compact('voluntarios'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_evento' => 'required|min:5|max:100',
            'descripcion' => 'required',
        ]);
        

        $evento = Evento::create($request->only('nombre_evento', 'descripcion'));
        $evento->voluntarios()->attach($request->voluntario_id, ['contacto' => $request->contacto ?? 0]);
        return redirect()->route('evento.show', $evento->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('eventos.eventoShow', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
        $voluntarios = Voluntarios::pluck('nombre', 'id');
        $seleccionados = $evento->voluntarios()->pluck('id');
        return view('eventos.eventoForm', compact('voluntarios', 'evento', 'seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->save();

        $evento->voluntarios()->sync($request->voluntario_id);
        return redirect()->route('evento.show', $evento->id)
        ->with(['mensaje' => 'Evento actualizado con éxito', 'tipo' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { //
        Evento::destroy($id);
        return redirect('evento');
    }

    /*public function notificarProyectoAprovado(Evento $evento)
    {
        //Carga los usuarios relacionados con un proyecto
        $evento->load('Voluntarios');

        //Envía correo al usuario
        Mail::to($evento->voluntarios->email)->send(new ($proyecto));

        return redirect()->route('proyecto.index');
    }*/

}
