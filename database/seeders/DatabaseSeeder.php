<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(100)->create();

        $categories = [
            'Entradas',
            'Platos Fuertes',
            'Bebidas Frías',
            'Bebidas Calientes',
            'Postres',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
        
        $defaultImage = 'https://www.recetasnestle.com.mx/sites/default/files/styles/recipe_detail_desktop/public/srh_recipes/paisaje-comida.jpg';

        $products = [
            // Entradas (ID 1)
            ['name' => 'Guacamole con totopos', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Ensalada César', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Queso fundido', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Sopa de tortilla', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Ceviche de camarón', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Nachos con carne', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Pan de ajo', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Bruschettas', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Croquetas de jamón', 'image' => $defaultImage, 'fk_categories' => 1],
            ['name' => 'Tostadas de tinga', 'image' => $defaultImage, 'fk_categories' => 1],

            // Platos Fuertes (ID 2)
            ['name' => 'Pechuga a la plancha', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Tacos al pastor', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Hamburguesa clásica', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Milanesa de res', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Fajitas mixtas', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Pollo en mole', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Arrachera asada', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Enchiladas suizas', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Spaghetti a la boloñesa', 'image' => $defaultImage, 'fk_categories' => 2],
            ['name' => 'Chiles rellenos', 'image' => $defaultImage, 'fk_categories' => 2],

            // Bebidas Frías (ID 3)
            ['name' => 'Agua de Jamaica', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Limonada', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Horchata', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Tamarindo', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Agua de pepino', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Jugo de naranja', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Refresco de cola', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Smoothie de mango', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Frappe de chocolate', 'image' => $defaultImage, 'fk_categories' => 3],
            ['name' => 'Agua mineral con limón', 'image' => $defaultImage, 'fk_categories' => 3],

            // Bebidas Calientes (ID 4)
            ['name' => 'Café Americano', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Té de Manzanilla', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Chocolate caliente', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Café con leche', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Té verde', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Capuchino', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Espresso', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Latte', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Té chai', 'image' => $defaultImage, 'fk_categories' => 4],
            ['name' => 'Café moka', 'image' => $defaultImage, 'fk_categories' => 4],

            // Postres (ID 5)
            ['name' => 'Pastel de Chocolate', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Flan Napolitano', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Helado de vainilla', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Pay de limón', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Gelatina mosaico', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Crepas de cajeta', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Brownie con nuez', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Pan de elote', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Cupcake de vainilla', 'image' => $defaultImage, 'fk_categories' => 5],
            ['name' => 'Arroz con leche', 'image' => $defaultImage, 'fk_categories' => 5],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }

    }
}
