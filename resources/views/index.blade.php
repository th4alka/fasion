@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">あ</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="{{route('fasion.create')}}">新規登録</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if($message = Session::get('success'))
                <div class="alert alert-sucess mt-1"><p>{{$message}}</p></div>
            @endif
        </div>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>名前</th>
            <th>価格</th>
            <th>分類</th>
            <th>色</th>
            <th>ブランド</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($fasions as $fasion)
        <tr>
            <td style="text-align:right">{{ $fasion->id }}</td>
            <td><a class="" href="{{route('fasion.show',$fasion->id)}}?page_id={{$page_id}}">{{ $fasion->name }}</a></td>
            <td style="text-align:right">{{ $fasion->kakaku }}円</td>
            <td style="text-align:right">{{ $fasion->bunrui }}</td>
            <td style="text-align:right">{{ $fasion->color }}</td>
            <td style="text-align:right">{{ $fasion->brand }}</td>
            <td style="text-align:center">
                <a class="btn btn-primary" href="{{route('fasion.edit',$fasion->id)}}?page_id={{$page_id}}">変更</a>
            </td>
            <td style="text-align:center">
                <form action="{{route('fasion.destroy',$fasion->id)}}"method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか");'>削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $fasions->links('pagination::bootstrap-5') !!}

@endsection