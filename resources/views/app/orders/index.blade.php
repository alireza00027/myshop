@extends('app.layouts.master')
@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>لیست سفارشات:{{$user->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Cart Area =================-->
    <section class="cart_area section_padding" dir="rtl">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">شماره</th>
                            <th scope="col">آدرس</th>
                            <th scope="col">مبلغ</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">زمان</th>
                            <th scope="col">تنظیمات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    <h5>{{$order->city->state->title.'/'.$order->city->title.'/'.$order->address}}</h5>
                                </td>
                                <td>
                                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                                      class="input-text qty input-number" />
                                    <button
                                      class="increase input-number-increment items-count" type="button">
                                      <i class="ti-angle-up"></i>
                                    </button>
                                    <button
                                      class="reduced input-number-decrement items-count" type="button">
                                      <i class="ti-angle-down"></i>
                                    </button> -->
                                    <h5>{{$order->total_price}}</h5>
                                </td>
                                <td>
                                    <h5>{{$order->status}}</h5>
                                </td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    @if($order->status=="processing")
                                        <form action="{{route('orders.cancel',['order'=>$order->id])}}" method="post">
                                            {{csrf_field()}}
                                            <div class="btn-group-sm">
                                                <a class="btn btn-sm btn-primary"href="{{route('orders.show',['order'=>$order->id])}}">جزئیات</a>
                                                <button type="submit" class="btn btn-sm btn-danger">لغو سفارش</button>
                                            </div>
                                        </form>
                                    @else
                                        <a class="btn btn-sm btn-primary"href="{{route('orders.show',['order'=>$order->id])}}">جزئیات</a>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->


@endsection
