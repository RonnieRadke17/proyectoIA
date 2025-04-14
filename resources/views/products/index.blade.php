<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Productos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Selector de categoría --}}
            <div class="mb-6">
                <form method="GET" action="{{ route('products.index') }}">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                        Selecciona una categoría:
                    </label>
                    <select id="category" name="category" onchange="this.form.submit()" class="w-full sm:w-60 rounded-md border-gray-300 shadow-sm">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            {{-- 🔝 POPULARES --}}
            @if ($popular->isNotEmpty())
                <h3 class="text-xl font-bold mt-8 mb-4 text-gray-800">🔝 Los mejores calificados y populares</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($popular as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ 'https://bahiaxip.com/image/post/main/JGEDEq9wcn0youT1ipHAU5mYdfHgB2BCsuIT7mTH.jpeg' }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600">UCB1: {{ number_format($product->ucb1, 4) }}</p>
                                <p class="text-sm text-gray-600">Vistas: {{ $product->views_count }} | Likes: {{ $product->likes_count }}</p>
                                <p class="text-sm text-gray-600 mt-1">Categoría: {{ $product->category->name ?? 'Sin categoría' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- ✨ EXPLORACIÓN --}}
            @if ($exploratory->isNotEmpty())
                <h3 class="text-xl font-bold mt-8 mb-4 text-gray-800">✨ Exploremos juntos algo nuevo</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($exploratory as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ 'https://bahiaxip.com/image/post/main/JGEDEq9wcn0youT1ipHAU5mYdfHgB2BCsuIT7mTH.jpeg' }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600">UCB1: {{ number_format($product->ucb1, 4) }}</p>
                                <p class="text-sm text-gray-600">Vistas: {{ $product->views_count }} | Likes: {{ $product->likes_count }}</p>
                                <p class="text-sm text-gray-600 mt-1">Categoría: {{ $product->category->name ?? 'Sin categoría' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- 📦 OTROS --}}
            @if ($others->isNotEmpty())
                <h3 class="text-xl font-bold mt-8 mb-4 text-gray-800">📦 Otros productos que podrían gustarte</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($others as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ 'https://bahiaxip.com/image/post/main/JGEDEq9wcn0youT1ipHAU5mYdfHgB2BCsuIT7mTH.jpeg' }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600">UCB1: {{ number_format($product->ucb1, 4) }}</p>
                                <p class="text-sm text-gray-600">Vistas: {{ $product->views_count }} | Likes: {{ $product->likes_count }}</p>
                                <p class="text-sm text-gray-600 mt-1">Categoría: {{ $product->category->name ?? 'Sin categoría' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
