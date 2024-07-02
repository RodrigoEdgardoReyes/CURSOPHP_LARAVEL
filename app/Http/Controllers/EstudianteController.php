<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{

    public function index(Request $request)
    {
        $query = Estudiante::query();

        if ($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->has('apellido')) {
            $query->where('apellido', 'like', '%' . $request->apellido . '%');
        }
        $estudiantes = $query->orderBy('id', 'desc')->simplePaginate(10);

        return view('estudiantes.index', compact('estudiantes'));
    }


    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->merge(['pin' => ($request->pin)]);
        $estudiante = Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente.');
    }



    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }

        return view('estudiantes.show', compact('estudiante'));
    }


    public function edit($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }
        return view('estudiantes.edit', compact('estudiante'));
    }


    public function update(Request $request, $id)
{
    $estudiante = Estudiante::find($id);

    if (!$estudiante) {
        return abort(404);
    }

    $estudiante->nombre = $request->nombre;
    $estudiante->apellido = $request->apellido;
    $estudiante->email = $request->email;

    $estudiante->save();

    return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
}

    public function delete($id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return abort(404);
        }
        return view('estudiantes.delete', compact('estudiante'));
    }


    public function destroy($id)
{
    $estudiante = Estudiante::find($id);

    if (!$estudiante) {
        return abort(404);
    }

    $estudiante->delete();

    return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
}

    public function showLoginForm()
    {
        return view('estudiantes.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'pin');

        if (Auth::guard('estudiante')->attempt($credentials)) {
            return redirect()->intended();
        }

        return redirect()->back()->withErrors([
            'InvalidCredentials' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        Auth::guard('estudiante')->logout();
        return redirect()->route('estudiantes.showLoginForm');
    }
}
