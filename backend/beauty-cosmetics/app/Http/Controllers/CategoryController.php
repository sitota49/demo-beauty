<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use JD\Cloudder\Facades\Cloudder;
class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('category_name')->get();
        return view('data_management.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('data_management.categories.create');
    }

   
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'string|required',
            'description' => 'string|required',
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

       // Create new  category
       $category = new Category;
       $category->category_name = $request->input('name');
       $category->description = $request->input('description');
       $category->image = $image_url;
       $category->save();


       return redirect()->route('category.index')->with('success', 'Category created successfully.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $category = Category::where('category_id', $id)->first();

        return view('data_management.categories.edit')->with([
            'category' => $category
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'description' => 'string|required',
            'image' => 'image|nullable|max:1999'
        ]);

        $image_url = '';

        // Handle file upload
        if($request->hasFile('image')) {
           // Get file name with extension
           $filenameWithExt = $request->file('image')->getClientOriginalName();
           // Get just file name
           $fileName = $request->file('image')->getRealPath();
        //    $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           Cloudder::upload($fileName, null);
           list($width, $height) = getimagesize($fileName);
           $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

         }

       $category = Category::where('category_id', $id)->first();
       $category->category_name = $request->input('name');
       $category->description = $request->input('description');
       $category->image = $request->hasFile('image') != null ? $image_url : $category->image;
       $category->update();

       return redirect()->route('category.index')->with('success', 'Category update successfully.');
  
    }

  
    public function destroy($id)
    {
        $category = Category::where('category_id', $id)->first();
        if($category->products->count() > 0) {
            return redirect()->route('category.index')->with('success',  "Category can't be removed. There are some products with it" . $category->name . " post category.");
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category removed successfully.');
  
    }
}
