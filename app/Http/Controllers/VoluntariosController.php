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
        $datos['voluntarios']=Voluntarios::all();
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

        $request->validate([
            'Nombre' => 'required|min:5|max:20',
            'Edad' => 'required|min:1|max:3',
            'Celular' => 'required|min:8|max:13',
            'Correo' => 'required|min:7|max:40',
            'Foto' => 'required',
        ]);
        $datosVoluntario=request()->except('_token');

        if($request->hasFile('Foto'))
        {
            $datosVoluntario['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Voluntarios::insert($datosVoluntario);
        $datos['voluntarios']=Voluntarios::all();
        return view('voluntarios.index', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function show(Voluntarios $voluntario)
    {
        //dd($voluntario);
        return view('voluntarios.show', compact('voluntario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Voluntarios $voluntario)
    {
        //
        return view('voluntarios.create', compact('voluntario')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voluntarios  $voluntarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voluntarios $voluntario)
    {
        //
        $request->validate([
            'Nombre' => 'required|min:5|max:20',
            'Edad' => 'required|min:1|max:3',
            'Celular' => 'required|min:8|max:13',
            'Correo' => 'required|min:7|max:40',
            'Foto' => 'required',
        ]);
        
        $voluntario->Nombre=$request->Nombre;
        $voluntario->Edad=$request->Edad;
        $voluntario->Correo=$request->Correo;
        $voluntario->Celular=$request->Celular;
        $voluntario->save(); 

        return redirect()->route('voluntarios.show', $voluntario->id);
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
