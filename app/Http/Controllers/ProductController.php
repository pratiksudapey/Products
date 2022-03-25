<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return(view("product.index", compact("product")));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('product.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
          ]);
          if ($validator->fails()) {
                  return redirect(route('product.create'))
                    ->withErrors($validator)
                    ->withInput();
          }
          $product = new Product();
          $product->name = $request->name;
          $product->price = $request->price;
          $product->description = $request->description;
          if($request->hasFile('image'))
          {
              $file = $request->file('image');
              $newName = time() . $file->getClientOriginalName();
              $file->move(public_path('images'), $newName);
              $product->image = "/images/" . $newName;
          }
          $product->save();
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return(view('product.edit'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
          ]);
          if ($validator->fails()) {
                  return redirect(route('product.edit'))
                    ->withErrors($validator)
                    ->withInput();
          }
        $product = Product::find($id);
          $product->name = $request->name;
          $product->price = $request->price;
          $product->description = $request->description;
          if($request->hasFile('image'))
          {
              $file = $request->file('image');
              $newName = time() . $file->getClientOriginalName();
              $file->move(public_path('images'), $newName);
              $product->image = "/images/" . $newName;
          }
          $product->save();
          return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.index")
        ->with('success', 'product successfully deleted');
    }
}
