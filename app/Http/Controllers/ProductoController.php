<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;

use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Producto::all();
        return view('Producto.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Producto::create([
                'nombre'=> $request->nombre,
                'cantidad'=>$request->cantidad,
                'descripcion'=>$request->descripcion
            ]);
            DB::commit();
            return redirect()->route('producto.index')
            ->with('success', '¡Producto Creado exitosamente!');
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('Producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pruducto = Producto::find($id);
        try{
            $pruducto->update([
                'nombre'=> $request->nombre,
                'cantidad'=>$request->cantidad,
                'descripcion'=>$request->descripcion
            ]);
            DB::commit();
            return redirect()->route('producto.index')
            ->with('success', '¡Producto Actulizado exitosamente!');
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try{
            Producto::destroy($producto->id);
            DB::commit();
            return redirect()->route('producto.index')
            ->with('success', '¡Producto Eliminado exitosamente!');
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
