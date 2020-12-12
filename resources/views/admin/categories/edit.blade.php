@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش دسته</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش دسته</li>
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
                                <h3 class="card-title">ویرایش</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('categories.update',['category'=>$category->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                @include('admin.section.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">عنوان دسته</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان دسته را وارد کنید" value="{{$category->title}}" >
                                    </div>
                                    @if($category->parent_id != 0)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="parent_id">دسته پدر</label>
                                                    <select id="parent_id" name="parent_id" class="form-control">
                                                        @foreach($parentCategories as $parentCategory)
                                                            <option value="{{$parentCategory->id}}">{{$parentCategory->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="parent_id">دسته پدر</label>
                                                    <select id="parent_id" name="parent_id" class="form-control" disabled="">
                                                        @foreach($parentCategories as $parentCategory)
                                                            <option value="0">دسته اصلی</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ویرایش</button>
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
