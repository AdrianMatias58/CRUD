@extends('haeader.index')
@section('titulo', 'Crear Producto')

@section('contenido')
<style>
    /* Estilo para ocultar las flechas del input number en Chrome, Safari, Edge y Firefox */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] { -moz-appearance: textfield; }
</style>

<div class="container mx-auto p-6 max-w-2xl">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Crear Nuevo Producto</h1>
        <a href="{{ route('producto.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-2 transition font-medium">
            Volver a la Lista
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <form action="{{ route('producto.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre del Producto</label>
                <input type="text" name="nombre" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Cantidad en Stock</label>
                <input type="number" name="cantidad" min="0" step="1" placeholder="0" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                <p class="text-xs text-gray-400 mt-1">* Solo se permiten números positivos</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Descripción</label>
                <textarea name="descripcion" rows="3" placeholder="Descripción breve..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none resize-none"></textarea>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition-all">
                    Guardar Producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
