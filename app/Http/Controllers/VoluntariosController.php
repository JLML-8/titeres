<?php

namespace App\Http\Controllers;

use App\Voluntarios;
use Illuminate\Http\Request;

class VoluntariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['voluntarios']=Voluntarios::paginate(5);
        return view('voluntarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('voluntarios.create');
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
        //$datosVoluntario=request()->all();
        $datosVoluntario=request()->except('_token');

        if($request->hasFile('Foto'))
        {
            $datosVoluntario['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Voluntarios::insert($datosVoluntario);
        $datos['voluntarios']=Voluntarios::paginate(5);
        return view('voluntarios.index', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function show(Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voluntarios $voluntarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Voluntarios::destroy($id);
        return redirect('voluntarios');
    }
}
