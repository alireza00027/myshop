@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست سفارشات قابل بررسی</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">لیست سفارشات قابل بررسی</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h3 class="card-title ">سفارشات قابل بررسی</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>آدرس</th>
                                    <th>مبلغ سفارش</th>
                                    <th>زمان</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->user->email}}</td>
                                        <td>{{$order->city->state->title.'/'.$order->city->title.'/'.$order->address}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td>
                                            <form class="form-group" action="{{route('orders.processing.confirm',['order'=>$order->id])}}" method="post">
                                                {{csrf_field()}}
                                                <div class="btn-group btn-group-sm mt-2">
                                                    <a href="{{route('orders.processing.show',['order'=>$order->id])}}" class="btn btn-primary">جزئیات سفارش</a>
                                                    <button type="submit" class="btn btn-danger">تائید</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام کاربر</th>
                                    <th>ایمیل کاربر</th>
                                    <th>آدرس</th>
                                    <th>مبلغ سفارش</th>
                                    <th>زمان</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
