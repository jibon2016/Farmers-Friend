<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->data['products'] = Product::all();
        toastr()->success('Data has been saved successfully!');
        return view('admin.products.product', $this->data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category'] = Category::all();
        $this->data['mode']     = 'create';
        $this->data['headline'] = 'Add New Product';
        return view('admin.products.from', $this->data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $frmdata = $request->all();

        if ($image = $request->file('picture')) {
            $destinationPath = 'Product_image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $frmdata['picture'] = "$profileImage";
        }

        if ( Product::create($frmdata)){
            toastr()->success('Product has been saved successfully!');
        };
        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::find($id); 
        return view('admin.products.show', $this->data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->data['product']      = Product::findOrFail($id);
        $this->data['category']     = Category::all();
        $this->data['mode']         = 'edit';
        $this->data['headline']     = 'Update Product Information';
    
        return view('admin.products.from', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $product = Product::find($id);
        if ($image = $request->file('picture')) {
            $destinationPath = 'Product_image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $frmdata['picture'] = "$profileImage";
            $product->picture           = $frmdata['picture'];
        }
        
        $product->category_id       = $data['category_id'];
        $product->title             = $data['title'];
        $product->description       = $data['description'];
        $product->cost_price        = $data['cost_price'];

        if (  $product->save()){
            toastr()->success('Product has been updated successfully!');
        }else{
            toastr()->success('Nothing to Update');
        }
        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::destroy($id)){
            toastr()->warning('Products deleted successfully');
        };
        return redirect()->to('products');
    }
}
