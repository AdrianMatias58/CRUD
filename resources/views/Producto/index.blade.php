@extends('haeader.index')
@section('titulo', 'Índice de Productos')

@section('contenido')
<div class="container mx-auto p-6">
    {{-- Mensaje de Éxito Temporal --}}
    @if (session('success'))
        <div id="alert-message" class="mb-6 flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 rounded-lg shadow-sm animate-pulse" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Listado de Productos</h1>
        <a href="{{ route('producto.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-300 ease-in-out">
            + Agregar Producto
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cantidad</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripción</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($product as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nombre }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            {{ $item->cantidad }} unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $item->descripcion }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('producto.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 transition font-medium">
                                Editar
                            </a>
                            <form action="{{ route('producto.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-900 transition font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('js/efectoMessage.js') }}"></script>
    <script>Efecto_Message('alert-message',3000)</script>
@endpush
