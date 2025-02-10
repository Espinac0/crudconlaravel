<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $campos = Schema::getColumnListing("alumnos");
        $exclude=["created_at","updated_at"];
        $campos= array_diff($campos,$exclude);
        $filas = Alumno::select($campos)->get();

        return view('alumnos.index', compact('filas',"campos"));
        //return view('alumnos.index', ["filas"=>$filas,"campos"=>$campos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'edad' => 'required|integer|min:1', // Validar que la edad sea un número entero positivo

        ]);

        // Crear un nuevo alumno
        Alumno::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'edad' => $request->edad, // Asegúrate de incluir el campo 'edad'
        ]);

        // Redirigir a la lista de alumnos con un mensaje de éxito
        return redirect()->route('alumnos.index')->with('success', 'Alumno añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash('message', 'Alumno eliminado correctamente');
        return redirect()->route('alumnos.index');
        //
    }
}
