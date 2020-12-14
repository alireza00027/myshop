@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست محصولات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">لیست محصولات</li>
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
                                    <h3 class="card-title ">محصولات</h3>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('products.create')}}" class="btn btn-warning ">افزودن محصول</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>نام محصول</th>
                                    <th>توضیحات</th>
                                    <th>قیمت</th>
                                    <th>تصویر</th>
                                    <th>تعداد</th>
                                    <th>تعداد بازدید</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td><a href="{{route('products.show',['product'=>$product->id])}}">{{$product->name}}</td>
                                        <td>description</td>
                                        <td>{{$product->price}}</td>
                                        <td><img class="img-fluid mb-3 w-25 h-25" src="{{asset('productsImages/'.$product->getThumbImage())}}"></td>
                                        <td>{{$product->count}}</td>
                                        <td>{{$product->view_count}}</td>
                                        <td>
                                            <form class="form-group" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <div class="btn-group btn-group-sm mt-2">
                                                    <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-primary">ویرایش</a>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نام محصول</th>
                                    <th>توضیحات</th>
                                    <th>قیمت</th>
                                    <th>تصویر</th>
                                    <th>تعداد</th>
                                    <th>تعداد بازدید</th>
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
