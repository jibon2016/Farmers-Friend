<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['title', 'description', 'cost_price','category_id', 'picture'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function arrayForSelect()
    {
        $arr = [];
        $products = Product::all();
        foreach ($products as $product){
            $arr['products'][$product->id] = $product->title;
        }
        return $arr;
    }
}
