@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{url('/fasions')}}?page={{$page_id}}">戻る</a>
        </div>
    </div>
</div>
 
<div style="text-align:left;">

<div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $fasion->name }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $fasion->kakaku }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($bunruis as $bunrui)
                    @if($bunrui->id==$fasion->bunrui) {{ $bunrui->str }} @endif
                @endforeach         
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($colors as $color)
                    @if($color->id==$fasion->color) {{ $color->str }} @endif
                @endforeach         
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($brands as $brand)
                    @if($brand->id==$fasion->brand) {{ $brand->str }} @endif
                @endforeach         
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <img src="{{ asset( '/storage/'.$fasion->path )}}">
            </div>
        </div>
        
    </div>

</div>
@endsection