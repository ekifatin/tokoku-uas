<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Book::all();

        //return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table = Book::create([
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "age" => $request->age
        // ]);

        $table = new Product();
        $table->product_name = $request->product_name;
        $table->category = $request->category;
        $table->description = $request->description;
        $table->price = $request->price;
        $table->stock = $request->stock;
        $table->picture = $request->picture;
        $table->save();

        //return $table
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Product::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $table = Product::find($id);
        if($table){
            $table->product_name = $request->product_name ? $request-> product_name : $table->product_name;
            $table->category = $request->category ? $request->category : $table->category;
            $table->description = $request->description ? $request->description : $table->description;
            $table->price = $request->price ? $request->price : $table->price;
            $table->stock = $request->stock ? $request->stock : $table->stock;
            $table->picture = $request->picture ? $request->picture : $table->picture;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Product::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}