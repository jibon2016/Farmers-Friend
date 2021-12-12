<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','category_icon'];


    
    public function product()
    {
        return $this->hasMany(Product::class);
    }







    public static function arrayforselect (){
        $arr = [];
        $categoris = Category::all();
        foreach ( $categoris as $category ){
            $arr['category'][$category->id] = $category->title;
        }

        return $arr;
    }

}
