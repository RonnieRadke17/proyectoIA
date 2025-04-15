<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Producto
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 flex justify-center">
        <div class="max-w-md bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Imagen del producto, tamaño más pequeño -->
            <div class="flex justify-center mt-6">
                <img 
                    src="{{ 'https://bahiaxip.com/image/post/main/JGEDEq9wcn0youT1ipHAU5mYdfHgB2BCsuIT7mTH.jpeg' }}"
                    alt="{{ $product->name }}"
                    class="w-48 h-48 object-cover rounded-xl"
                />
            </div>

            <!-- Sección de datos -->
            <div class="p-6 text-center">
                <!-- Nombre del producto -->
                <h1 class="text-2xl font-bold text-gray-900 mb-1">
                    {{ $product->name }}
                </h1>

                <!-- Datos adicionales (ejemplo) -->
                <p class="text-sm text-gray-500 mb-3">Platillo recomendado</p>
                <p class="text-gray-600 text-sm mb-1">
                    Categoría: <span class="font-semibold">{{ $product->category->name ?? 'Sin categoría' }}</span>
                </p>
                <div class="text-gray-700 text-sm mb-3">
                    <p><strong>UCB1:</strong> {{ number_format($product->ucb1, 4) }}</p>
                    <p><strong>Vistas:</strong> {{ $product->views_count }}</p>
                    <p><strong>Likes:</strong> {{ $product->likes_count }}</p>
                </div>

                <!-- Botones de acción (solo diseño) -->
                <div class="flex justify-center space-x-2">
                    <button
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 text-sm font-medium">
                        No me interesa
                    </button>
                    <button
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm font-medium">
                        Me gusta
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
