@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Products in category <i>{{$category->name}}</i></div>
                    @if (count($category->products))
                        @foreach($category->products as $product)
                            <div class="panel-body">
                                <a href="{{url('/product', $product->id)}}">{{ $product->name }}</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection