@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Details of product</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="id">Id</label>
                                <span id="id">{{ $product->id }}</span>
                                <br>
                                <label for="name">Name</label>
                                <span id="name">{{ $product->name }}</span>
                                <br>
                                <label for="">Categories</label>
                                @foreach($product->categories as $category)
                                    &nbsp;&nbsp;<a href="{{url('/category', $category->id)}}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="col-md-5">
                                @if(session()->has('basket.'.$product->id))
                                    <label class="message">Product is in the basket.</label>
                                    <a href="{{url('/basket')}}" class="btn btn-default within"
                                       style="display: block">Go to basket</a>
                                    <a href="" class="btn btn-default btn-basket without" style="display: none">Add
                                        to basket</a>
                                @else
                                    <label class="message"><br></label>
                                    <a href="{{url('/basket')}}" class="btn btn-default within"
                                       style="display: none">Go to basket</a>
                                    <a href="" class="btn btn-default btn-basket without" style="display: block">Add
                                        to basket</a>
                                @endif
                                <a href="{{url('/')}}">Back to catalog</a>
                            </div>
                        </div>
                        <br>
                        <img src="{{ $product->photo }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="/js/basket.js"></script>
@endsection