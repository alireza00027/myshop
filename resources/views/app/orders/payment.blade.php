@extends('app.layouts.master')

@section('content')

    <div class="row">
        <form action="{{route('orders.payment',['order'=>$order->id])}}" method="post" class="form-group-lg">
            {{csrf_field()}}
            <div class="col-sm-6">
                <h4>مبلغ پرداختی:{{$order->total_price}}</h4>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-lg btn-dark" type="submit">پرداخت</button>
            </div>
        </form>
    </div>

@endsection()
