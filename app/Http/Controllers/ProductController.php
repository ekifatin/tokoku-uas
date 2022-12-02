<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // show data
    public function index()
    {
        $data = Product::all();

        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $data
        ], 200);
    }

   // add data
    public function store(Request $request)
    {
        $store = Product::create($request->all());

        //return $store;
        return response()->json([
            "message" => "Create data success",
            "data" => $store
        ], 200);
    }

    // show by category
    public function show($category)
    {
        $show = Product::where('category', 'like', '%' . $category . '%')->get();
        if($show){
            return response()->json([
                "message" => "Show data Success",
                "data" => $show 
            ]);
        }else{
            return ["message" => "Data not found"];
        }
    }

    // update product
    public function update(Request $request, $id)
    {
        $update = Product::where("id_product", $id)->update($request->all());
        
        // return $update;
         return response()->json([
            "message" => "Update data success",
            "data" => $update
        ], 200);
    }

    // delete product
    public function destroy($id)
    {
        $data = Product::where("id_product", $id);
        if($data){
            $data->delete();
            return["message" => "Delete Success"];
        }else{
            return["message" => "Data not found"];
        }
    }
}