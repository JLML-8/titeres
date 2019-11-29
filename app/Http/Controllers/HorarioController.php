<?php

namespace App\Http\Controllers;

use App\Horario;
use App\Voluntarios;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $horarios=Horario::paginate(5);
        return view('horarios.horarioShow', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voluntarios = Voluntarios::pluck('Nombre', 'id');
        return view('horarios.horariosForm', compact('voluntarios'));
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
            'dia' => 'required|min:5|max:15',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ]);

        $datoHorario=request()->except('_token');
        Horario::insert($datoHorario);
        $datos['horarios']=Horario::paginate(5);
        return view('horarios.horarioShow', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
        return view('horarios.horarioShow', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Horario::destroy($id);
        return redirect('horario');
    }
}
