@extends('haeader.index')
@section('titulo', 'Editar Producto')

@section('contenido')
    <h1>Editar Producto</h1>
    <div>
    <a href="{{ route('producto.index') }}">
        Lista de Porductos
    </a>
    </div>
    <div>
        <form action="{{ route('producto.update', $producto->id) }}" method="POST">
            @method('PUT')
            @csrf
                <label> Nombre </label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">


                <label> Cantidad </label>
                <input type="number" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}">


                <label> Descripcion  </label>
                <input type="text" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">

            <button type="submit">Guardar producto</button>
        </form>
    </div>
@endsection
