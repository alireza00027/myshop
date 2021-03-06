@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>افزودن ویژگی</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">افزودن ویژگی</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">افزودن ویژگی جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <form role="form" action="{{route('meta.store')}}" method="post">
                                    {{csrf_field()}}
                                    @include('admin.section.errors')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="product_id">شناسه محصول</label>
                                                <input class="form-control" id="product_id" name="product_id" value="{{$product->id}}" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label for="key">عنوان ویژگی</label>
                                                <input type="text" class="form-control" id="key" name="key" placeholder="عنوان ویژگی را وارد کنید">
                                            </div>
                                            <div class="form-group">
                                                <label for="value">مقدار ویژگی</label>
                                                <input type="text" class="form-control" id="value" name="value" placeholder="مقدار ویژگی را وارد کنید">
                                            </div>
                                            <button class="btn btn-success" type="submit">ذخیره</button>
                                        </div>
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
