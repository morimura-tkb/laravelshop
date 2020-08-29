<!-- add機能 -->
@extends('layouts.layout')

@section('styles')
<style type="text/css">
.link {
    font-size:20px;
    text-decoration:underline;
}

.form-group{
  line-height:30px
}

.error{
  font-size:12px;
  width:60%;
  background:#f8cccc;
}

</style>
@endsection

@section('title','情報管理')

@section('subtitle','商品追加')

@section('content')
<div class="link">
    <div class="prodict_add">
        <a href="/shopping/manage/product_add">商品追加</a>
    </div>
    <div class="product_edit">
        <a href="/shopping/manage/product_edit">商品編集</a>
    </div>
</div>



<form class="form-group" action="" method=POST>
@csrf   
<div class="product_name">
    @if($errors->has('name'))
        <div class="error">
			@foreach($errors->get('name') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="name">商品名:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
</div>
<div class="product_price">
    @if($errors->has('price'))
        <div class="error">
			@foreach($errors->get('price') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="price">価格:</label>
    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" />
</div>
<div class="product_stock">
    @if($errors->has('stock'))
        <div class="error">
			@foreach($errors->get('stock') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="stock">在庫:</label>
    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" />
</div>
<div class="product_limited">
    @if($errors->has('limited'))
        <div class="error">
			@foreach($errors->get('limited') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="limited">年齢制限:</label>
    <input type="number" class="form-control" id="limited" name="limited" value="{{ old('limited') }}" />
</div>

カテゴリなし->0
カテゴリ<おすすめ>--1<br>
カテゴリ<男性向け>--2<br>
カテゴリ<女性むけ>--3<br>
カテゴリ<ギフト>--4<br>

<div class="product_ref1">
    @if($errors->has('ref1'))
        <div class="error">
			@foreach($errors->get('ref1') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="ref1">カテゴリ1:</label>
    <input type="number" class="form-control" id="ref1" name="ref1" value="{{ old('ref1') }}" />
</div>
<div class="product_ref2">
    @if($errors->has('ref2'))
        <div class="error">
			@foreach($errors->get('ref2') as $message)
			    ・{{$message }}<br>
		    @endforeach
        </div>
    @endif
    <label for="ref2">カテゴリ2:</label>
    <input type="number" class="form-control" id="ref2" name="ref2" value="{{ old('ref2') }}" />
</div>
<div class="add">
    <input type="submit" name="product_add" value="商品追加">
</div>
</form>

@endsection
