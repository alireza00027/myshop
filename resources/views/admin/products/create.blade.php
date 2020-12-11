@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ایجاد محصول جدید</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ایجاد محصول جدید</li>
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
                            <div class="card-header d-flex">
                                <h3 class="card-title">محصول جدید</h3>
                                <div class="justify-content-between">
                                    <a href="{{route('categories.index')}}"class="btn btn-warning">دسته بندی ها</a>
                                    <a href="{{route('tags.index')}}"class="btn btn-success">برچسب ها</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">نام محصول</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="نام محصول را وارد کنید" >
                                    </div>
                                    <div class="form-group">
                                        <label for="description">توضیحات کوتاه</label>
                                        <textarea rows="6" type="text" class="form-control" id="description" name="description" placeholder="توضیحات کوتاه را وارد کنید"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">ارسال تصویر</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images" name="images">
                                                <label class="custom-file-label" for="images">انتخاب تصویر</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <label for="count">تعداد محصول</label>
                                            <input type="number" class="form-control" id="count" name="count" placeholder="تعداد محصول را وارد کنید" >
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="price">قیمت محصول</label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="قیمت محصول را وارد کنید" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>انتخاب دسته</label>
                                                <select multiple class="form-control">
                                                    <option>گزینه 1</option>
                                                    <option>گزینه 2</option>
                                                    <option>گزینه 3</option>
                                                    <option>گزینه 4</option>
                                                    <option>گزینه 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>انتخاب برچسب</label>
                                                <select multiple class="form-control">
                                                    <option>گزینه 1</option>
                                                    <option>گزینه 2</option>
                                                    <option>گزینه 3</option>
                                                    <option>گزینه 4</option>
                                                    <option>گزینه 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </form>
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
