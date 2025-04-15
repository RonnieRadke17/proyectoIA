<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Category;


class ProductController extends Controller
{
       
    public function index(Request $request)
{
    $categoryId = $request->input('category', 1);
    $categories = Category::all();
    $totalViews = DB::table('product_user')->count();

    // Obtener productos y calcular UCB1
    $products = Product::where('fk_categories', $categoryId)
        ->with('category')
        ->withCount([
            'users as views_count',
            'users as likes_count' => function ($query) {
                $query->where('recommendation', 1);
            }
        ])
        ->get()
        ->map(function ($product) use ($totalViews) {
            $views = $product->views_count ?: 1;
            $likes = $product->likes_count;
            $product->ucb1 = ($likes / $views) + sqrt((2 * log($totalViews ?: 1)) / $views);
            $product->like_ratio = $likes / $views;
            return $product;
        })
        ->sortByDesc('ucb1')
        ->values();

    $total = $products->count();
    $topLimit = max(1, floor($total * 0.25));

    // 🔝 POPULARES = Top 25% UCB1
    $popular = $products->take($topLimit);
    $assignedIds = $popular->pluck('id');

    // ✨ EXPLORACIÓN = Bottom 30% vistas, mejores ratios de likes
    $minViewsThreshold = $products->pluck('views_count')->sort()->take(floor($total * 0.3))->last();

    $exploratory = $products->filter(fn($p) =>
        $p->views_count <= $minViewsThreshold &&
        !$assignedIds->contains($p->id)
    )->sortByDesc('like_ratio')->take(3)->values();

    $assignedIds = $assignedIds->merge($exploratory->pluck('id'));

    // 📦 OTROS = Todo lo demás
    $others = $products->reject(fn($p) => $assignedIds->contains($p->id))->values();

    // 🛟 Fallback si exploración se queda vacía
    if ($exploratory->isEmpty()) {
        $candidate = $products
            ->filter(fn($p) => !$assignedIds->contains($p->id))
            ->sortBy('views_count')
            ->sortByDesc('like_ratio')
            ->first();

        if ($candidate) {
            $exploratory->push($candidate);
            $assignedIds->push($candidate->id);
            $others = $others->reject(fn($p) => $p->id === $candidate->id)->values();
        }
    }

    return view('products.index', compact('categories', 'categoryId', 'popular', 'exploratory', 'others'));

}
public function show($id)
{
    $product = Product::with('category')
        ->withCount([
            'users as views_count',
            'users as likes_count' => function ($query) {
                $query->where('recommendation', 1);
            }
        ])
        ->findOrFail($id);

    $totalViews = DB::table('product_user')->count();
    $views = $product->views_count ?: 1;
    $likes = $product->likes_count;

    $product->ucb1 = ($likes / $views) + sqrt((2 * log($totalViews ?: 1)) / $views);

    $likedByUser = $product->users()
        ->where('id_user', auth()->id())
        ->where('recommendation', 1)
        ->exists();

    return view('products.show', compact('product', 'likedByUser'));
}
public function toggleLike($id)
{
    $user = auth()->user();
    $product = Product::findOrFail($id);

    $exists = $product->users()
        ->where('id_user', $user->id)
        ->where('recommendation', 1)
        ->exists();

    if ($exists) {
        // Ya le había dado like → lo quitamos
        $product->users()->updateExistingPivot($user->id, ['recommendation' => 0]);
    } else {
        // Si no existía, lo creamos o actualizamos a like
        $product->users()->syncWithoutDetaching([
            $user->id => ['recommendation' => 1]
        ]);
    }

    return redirect()->route('products.show', $id);
}


    
}
