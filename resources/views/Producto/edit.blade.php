@extends('haeader.index')
@section('titulo', 'Editar Producto')

@section('contenido')
<style>
    /* Ocultar flechas del input number */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] { -moz-appearance: textfield; }
</style>

<div class="container mx-auto p-6 max-w-2xl">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">Editar Producto</h1>
            <p class="text-sm text-gray-500">Modificando: <span class="font-bold text-indigo-600">{{ $producto->nombre }}</span></p>
        </div>
        <a href="{{ route('producto.index') }}" class="text-gray-600 hover:text-indigo-600 flex items-center gap-2 transition font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 8.959 8.959 0 01-9 9m-9-9a9 9 0 019-9" />
            </svg>
            Cancelar
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-t-4 border-t-indigo-500">
        <form action="{{ route('producto.update', $producto->id) }}" method="POST" class="space-y-6">
            @method('PUT')
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre del Producto</label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cantidad</label>
                <input type="number" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" min="0" required
                    onkeypress="return event.charCode >= 48"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition duration-200">
                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider">Solo valores positivos</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Descripción</label>
                <textarea name="descripcion" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none resize-none transition duration-200">{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="pt-4 flex gap-3">
                <button type="submit"
                    class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all transform active:scale-95">
                    Actualizar Datos
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
