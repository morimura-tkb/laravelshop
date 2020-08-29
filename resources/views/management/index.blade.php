<!-- add,editへの接続 -->
@extends('layouts.layout')

@section('styles')
<style type="text/css">
.link {
    font-size:20px;
    text-decoration:underline;
}

.message{
    color:red;
}
</style>
@endsection

@section('title','情報管理')

@section('subtitle','情報管理')

@section('content')
@if($msg)
<div class="message">
    <p>{{$msg}}</p>
</div>
@endif
<div class="link">
    <div class="prodict_add">
        <a href="/shopping/manage/product_add">商品追加</a>
    </div>
    <div class="product_edit">
        <a href="/shopping/manage/product_edit">商品編集</a>
    </div>
</div>

@endsection

