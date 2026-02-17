@extends('haeader.index')
@section('titulo', 'index de productos')

@section('contenido')

    <div>
    <a href="{{ route('producto.create') }}">
        Agregar Producto
    </a>
    </div>
    <div>
        <table>
         <tr>
           <th>Nombre</th>
           <th>Cantidad</th>
           <th>Descripcione</th>
           <th>Acciones</th>
         </tr>
        @foreach ($product as $item)
         <tr>
               <td>{{ $item->nombre}}</td>
               <td>{{ $item->cantidad}}</td>
               <td>{{ $item->descripcion}}</td>
               <td><a href="{{ route('producto.edit', $item->id) }}">Editar</a>
                |
                <a href=""> Eliminar</a></td>
        </tr>
        @endforeach
       </table>
    </div>
@endsection
