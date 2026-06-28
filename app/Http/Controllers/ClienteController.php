<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    // Mostrar el dashboard completo (con la lista de clientes ya cargada)
    public function index()
    {
        $clientes = Cliente::all();

        return view('dashboard', compact('clientes'));
    }


    // Guardar cliente nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email'
        ]);

        Cliente::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo
        ]);

        return redirect('/dashboard?seccion=clientes')
            ->with('mensaje', 'Cliente agregado exitosamente');
    }


    // Actualizar cliente existente
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email'
        ]);

        $cliente->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo
        ]);

        return redirect('/dashboard?seccion=clientes')
            ->with('mensaje', 'Cliente actualizado exitosamente');
    }


    // Eliminar cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect('/dashboard?seccion=clientes')
            ->with('mensaje', 'Cliente eliminado exitosamente');
    }

}