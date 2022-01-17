<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::orderBy('product_name')->with('category')->get();
    
        return view('data_management.products.index')->with([
            'products' => $products
        ]);
    }

   
    public function create()
    {
        $categories = Category::orderBy('category_name')->pluck('category_name', 'category_id');
       
        return view('data_management.products.create')->with([
            'categories' => $categories,
        ]);
    }

  
    public function store(Request $request)
    {
        
         $this->validate($request, [
            'category' => 'required',
            'product_name' => 'string|required',
            'description' => 'string|required',
            'stock' => 'integer|required',
            'unit_price' => 'numeric|required',
            'image' => 'image|nullable|max:1999'
        ]);

       $image_url = '';

        // Handle file upload
        if($request->hasFile('image')) {
           // Get file name with extension
           $filenameWithExt = $request->file('image')->getClientOriginalName();
           // Get just file name
        //    $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileName = $request->file('image')->getRealPath();
            // dd($fileName);
           Cloudder::upload($fileName, null);
           list($width, $height) = getimagesize($fileName);
           $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        
       }

        $product = new Product;
        $product->category_id = $request->input('category');
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->score = 0;
        $product->unit_price = $request->input('unit_price');
        $product->image = $image_url;
        $product->save();


        return redirect()->route('product.index')->with('success', 'Product created successfully.');

    }

    
    public function show($id)
    {
         $product = Product::where('product_id', $id)->with('category')->first();

        return view('data_management.products.show')->with([
            'product' => $product
        ]);
    }

   
    public function edit($id)
    {
        $categories = Category::orderBy('category_name')->pluck('category_name', 'category_id');
        $product = Product::where('product_id', $id)->with('category')->first();


        return view('data_management.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'product_name' => 'string|required',
            'description' => 'string|required',
            'stock' => 'integer|required',
            'unit_price' => 'numeric|required',
            'image' => 'image|nullable|max:1999'
        ]);
         $image_url = '';

        if($request->hasFile('image')) {
           // Get file name with extension
           $filenameWithExt = $request->file('image')->getClientOriginalName();
           // Get just file name
        //    $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileName = $request->file('image')->getRealPath();
            // dd($fileName);
           Cloudder::upload($fileName, null);
           list($width, $height) = getimagesize($fileName);
           $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

       }

        $product = Product::where('product_id', $id)->first();
        $product->category_id = $request->input('category');
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->unit_price = $request->input('unit_price');
        $product->image = $request->hasFile('image') != null ? $image_url : $product->image;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');


    }

   
    public function destroy($id)
    {
        $product = Product::where('product_id', $id)->first();
        if($product->orderItems->count() > 0) {
            return redirect()->route('product.index')->with('success',  "Product can't be removed. There are some order items with" . $product->name . " product.");
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product removed successfully.');
  
    }
}
