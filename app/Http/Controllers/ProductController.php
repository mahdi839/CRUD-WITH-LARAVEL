<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
   $products =  Product::latest()->paginate(5);
        return view('Products.index',
        ['products'=>$products]);
   }
   public function create(){
    return view('Products.create');
}

public function store(Request $request){

   // validation data
      $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
      ]);
    // upload image
   $ImageName = time().'.'.$request->image->extension();
   $request->image->move(public_path('products'), $ImageName);
    $products = new Product();
    $products->image = $ImageName;
    $products->name = $request->name;
    $products->description = $request->description;
    $products->save();
    return back()->withSuccess('Product Create Successfully !!');
}
public function edit ($id){
    $product = Product::where('id',$id)->first();
       return view('Products.edit',['product'=> $product]);
}
public function update (Request $request,$id){
  // validation data
  $request->validate([
    'name' => 'required',
    'description' => 'required',
    'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
  ]);

  $products = Product::where('id',$id)->first();

    if(isset($request->image)){
        // upload image
        $ImageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $ImageName);
    $products->image = $ImageName;
    }
    $products->name = $request->name;
    $products->description = $request->description;
    $products->save();
    return back()->withSuccess('Product updated Successfully !!');
}

public function destroy ($id){
    $product = Product::where('id',$id)->first();
    $product->delete();
    return back()->withSuccess('Product deleted Successfully !!');
}
public function show ($id){
    $product = Product::where('id',$id)->first();
    return view('Products.show',['product'=>$product]);
}

}
