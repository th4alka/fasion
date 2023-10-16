@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/fasions') }}">戻る</a>
        </div>
    </div>
</div>
 
<div style="text-align:right;">
<form action="{{ route('fasion.store') }}" method="POST">
    @csrf
     
     <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red">名前を20字以内で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="kakaku" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red">価格を入力してください</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="bunrui" class="form-select">
                    <option>分類を選択してください</otion>
                    @foreach ($bunruis as $bunrui)
                        <option value="{{ $bunrui->id }}">{{ $bunrui->str }}</otion>
                    @endforeach
                </select>
                @error('bunrui')
                <span style="color:red">分類を選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="color" class="form-select">
                    <option>色を選択してください</otion>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->str }}</otion>
                    @endforeach
                </select>
                @error('color')
                <span style="color:red">色を選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="brand" class="form-select">
                    <option>ブランドを選択してください</otion>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->str }}</otion>
                    @endforeach
                </select>
                @error('brand')
                <span style="color:red">ブランドを選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="file" name="img" class="form-control" placeholder="画像">
                @error('img')
                <span style="color:red">画像を選択してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div>      
</form>
</div>
@endsection