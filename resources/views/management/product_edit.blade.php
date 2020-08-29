<!-- delete,update機能 -->
@extends('layouts.layout')

@section('styles')
<style type="text/css">
.link {
    font-size:20px;
    text-decoration:underline;
}

.form-group{
    line-height:30px;
    padding: 0.5em 1em;
    background: #cde4ff;/*背景色*/
}

.product_table{
    margin:20px;
    height:100px;
    width:80%;
}
</style>
@endsection

@section('title','情報管理')

@section('subtitle','商品編集')

@section('content')
<div class="link">
    <div class="prodict_add">
        <a href="/shopping/manage/product_add">商品追加</a>
    </div>
    <div class="product_edit">
        <a href="/shopping/manage/product_edit">商品編集</a>
    </div>
</div>

<form class="form-group" action="" method="POST">
    @csrf
    <label for="product_id">商品ID</label>
    <input class="product_id" id="product_id" name="product_id" type="number">
    <input type="submit" value="検索">
</form>
@if(!empty($product))
<form class="form-group" action="/shopping/manage/product_update" method="POST">
@csrf
    <table class="product_table" border="1">
        <tr><th>ID</th><th>商品名</th><th>価格</th><th>在庫数</th><th>年齢制限</th><th>関連1</th><th>関連2</th></tr>
        <tr><th><input type="hidden" name="product_id" value={{$product->id}}>{{$product->id}}</th>
            <th><input type="text" id="product_name" name="product_name" value={{$product->name}}></th>
            <th><input type="number" id="product_price" name="product_price" value={{$product->price}}></th>
            <th><input type="number" id="product_stock" name="product_stock" value={{$product->stock}}></th>
            <th><input type="number" id="product_limited" name="product_limited" value={{$product->limited}}></th>
            <th><input type="number" id="product_ref1" name="product_ref1" value={{$connection->ref1}}></th>
            <th><input type="number" id="product_ref2" name="product_ref2" value={{$connection->ref2}}></th>
        </tr>
    </table>
    <input type="submit" value="変更">
</form>
<form class="form-group" action="/shopping/manage/product_delete" method="POST">
    @csrf
    <input type="hidden" name="product_id" value={{$product->id}}>
    <input type="submit" value="商品削除">
</form>
@endif

@endsection
