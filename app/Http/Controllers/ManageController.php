<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;
use App\Cart;
use App\Product;
use Carbon\Carbon;
use App\Http\Requests\ProductAdd;


class ManageController extends Controller
{
    public function index(){
        $msg = "";
        $data = ['msg'=> $msg];
        return view('management.index',$data);
    }

    public function create(){
        return view('management.product_add');
    }

    public function add(ProductAdd $request){
        $id = Product::insertGetId(['name'=>$request->name,
                        'price'=>$request->price,
                        'stock'=>$request->stock,
                        'limited'=>$request->limited,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                        ]);
        
        Connection::insert(['product_id'=>$id,
                            'ref1'=>$request->ref1,
                            'ref2'=>$request->ref2,
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now()]);
                            
        
        $msg = "商品情報を登録しました。";
        return view('management.index',['msg'=>$msg]);
        
    }

    public function edit(){
        return view('management.product_edit');
    }

    public function id_edit(Request $request){
        $product = Product::find($request->product_id);
        $connection = Connection::where('product_id',$request->product_id)->first();
        $data = ['product'=>$product,'connection'=>$connection];
        return view('management.product_edit',$data);
    }

    public function update(Request $request){
        Product::find($request->product_id)->update(
            ['name'=>$request->product_name,
            'price'=>$request->product_price,
            'stock'=>$request->product_stock,
            'limited'=>$request->product_limited]);
        Connection::where('product_id',$request->product_id)->update(
            ['ref1'=>$request->product_ref1,
            'ref2'=>$request->product_ref2]);
            $msg = "商品情報を変更しました。";
        return view('management.index',['msg'=>$msg]);
    }

    public function delete(Request $request){
        Connection::where('product_id',$request->product_id)->delete();
        Product::find($request->product_id)->delete();
        $msg = "商品情報を削除しました。";
        return view('management.index',['msg'=>$msg]);
    }

}
