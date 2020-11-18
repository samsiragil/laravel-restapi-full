<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ProductModel;

class apiController extends Controller
{
    public function get_all_product(){
        return response()->json(ProductModel::all(),200);
    }

    public function insert_product(Request $request){
        $insert_product = new ProductModel;
        $insert_product->id = (string) Str::uuid();
        $insert_product->code = $request->code;
        $insert_product->name = $request->name;
        $insert_product->qty = $request->qty;
        $insert_product->save();
        return response([
            'success' => true,
            'message' => 'Create product was successfully',
            'data' => $insert_product
        ], 200);
    }

    public function update_product(Request $request, $id){
        $product_record = ProductModel::firstWhere('id',$id);
        if($product_record){
            $product = ProductModel::find($id);
            $product->code = $request->code;
            $product->name = $request->name;
            $product->qty = $request->qty;
            $product->save();
            return response([
                'success' => true,
                'message' => 'Update product was successfully',
                'data' => $product
            ], 200);
        }else{
            return response([
                'success' => false,
                'message' => 'Product not found'
            ], 200);
        }
    }

    public function delete_product($id){
        $product_record = ProductModel::firstWhere('id',$id);
        if($product_record){
            ProductModel::destroy($id);
            return response([
                'success' => true,
                'message' => 'Delete product was successfully'
            ], 200);
        }else{
            return response([
                'success' => false,
                'message' => 'Product not found'
            ], 200);
        }
    }
}
