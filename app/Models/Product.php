<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img', 'fk_categories'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_categories');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user', 'id_product', 'id_user')
                    ->withPivot('recommendation')
                    ->withTimestamps();
    }

}
