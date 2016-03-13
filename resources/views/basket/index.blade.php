@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Basket</div>
                    <div class="panel-body">
                        <p><a href="{{url('/')}}">Back to catalog</a></p>
                    </div>
                    @if (count($products))
                        <table class="table">
                            <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>image</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>sum</th>
                            <th>delete</th>
                            </thead>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <span class="id">{{ $product->id }}</span>
                                    </td>
                                    <td>
                                        <span class="name">{{ $product->name }}</span>
                                    </td>
                                    <td>
                                        <img width="128" height="96" src="{{ $product->photo }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn-quantity minus"><span
                                                    class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                        <input type="text" class="quantity" readonly
                                               value="{{session('basket.'.$product->id)}}" size="5"
                                               style="text-align: center;">
                                        <button type="button" class="btn-quantity plus"><span
                                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <span class="price">{{ $product->price }}</span>
                                    </td>
                                    <td>
                                        <span class="sum">{{session('basket.'.$product->id) * $product->price}}</span>
                                    </td>
                                    <td>
                                        <a href="{{url('/remove', $product->id)}}">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="panel-footer">Total sum of the basket:
                            <span id="total-sum" style="color: #FF0000; font-weight: 700; font-size: larger;"> {{$totalSum}}</span>
                        </div>
                    @else
                        <div class="well">Basket is empty.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="/js/basket.js"></script>
@endsection