<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ProductSearchController extends Controller
{

    public function products()
    {
        $this->data['products']     = Product::all();
        $this->data['categories']   = Category::all();
        return view('products', $this->data );
    }

    public function search(Request $request)
    {
        $inputSearch = $request['inputSearch'];
        if ($inputSearch == Null) {
            return json_encode('ook');
        }else{
            $keyResult = Product::where('title', 'LIKE', '%'.$inputSearch. '%') 
            ->orWhere('tags', 'LIKE', '%'.$inputSearch. '%') 
            ->get();
            return json_encode($keyResult);
        }
    }
}
