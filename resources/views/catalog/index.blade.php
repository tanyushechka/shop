@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">10 Last Products</div>
                    @if (count($products))
                        @foreach($products as $product)
                            <div class="panel-body">
                                <a href="{{url('/product', $product->id)}}">{{ $product->name }}</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">All Categories</div>
                    @if (count($categories))
                        @foreach($categories as $category)
                            <div class="panel-body">
                                <a href="{{url('/category', $category->id)}}">{{ $category->name }}</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection