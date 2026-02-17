@extends('haeader.index')
@section('titulo', 'index de productos')

@section('contenido')
    <h1>Crear Producto</h1>
    <div>
    <a href="{{ route('producto.index') }}">
        Lista de Porductos
    </a>
    </div>
    <div>
        <form action="{{ route('producto.store') }}" method="POST">
            @csrf

                <label> Nombre </label>
                <input type="text" name="nombre">


                <label> Cantidad </label>
                <input type="number" name="cantidad">


                <label> Descripcion  </label>
                <input type="text" name="descripcion">

            <button type="submit">Guardar producto</button>
        </form>
    </div>
@endsection
