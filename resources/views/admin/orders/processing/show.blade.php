@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>محصول</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مشاهده سفارش</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">شفارش:{{$order->user->name}}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">محصول</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">تعداد</th>
                                        <th scope="col">جمع کل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <!--<div>
                                                        <img src="{{asset('productsImages/'.($item->getProduct())->getThumbImage())}}" alt="" />
                                                    </div>-->
                                                    <div class="media-body">
                                                        <p>{{($item->getProduct())->name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>{{($item->getProduct())->price}} تومان</h5>
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
                                                <h5>{{$item->product_count}}</h5>
                                            </td>
                                            <td>
                                                <h5>{{$item->price}}</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>آدرس</td>
                                        <td><h5>{{$order->city->state->title.'/'.$order->city->title.'/'.$order->address}}</h5></td>
                                        <td>وضعیت</td>
                                        <td>{{$order->status}}</td>
                                        <td>مجموع</td>
                                        <td>
                                            {{$order->total_price}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                <form class="form-group" action="{{route('orders.processing.confirm',['order'=>$order->id])}}" method="post">
                                    {{csrf_field()}}
                                    <div class="btn-group btn-group-sm mt-2">
                                        <button type="submit" class="btn btn-danger">تائید</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection

