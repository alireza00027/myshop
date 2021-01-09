@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست مقام ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">لیست مقام ها</li>
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
                                    <h3 class="card-title ">مقام ها</h3>
                                </div>
                                <div class="col-sm-2">
                                    <div class="btn-group">
                                        <a href="{{route('roles.create')}}" class="btn btn-success ">ایجاد نقش جدید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>نام مقام</th>
                                    <th>توضیحات</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->label}}</td>
                                        <td>
                                            <form class="form-group" action="{{route('roles.destroy',['role'=>$role->id])}}" method="post" >
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <div class="btn-group-sm">
                                                    <a class="btn btn-primary" href="{{route('roles.edit',['role'=>$role->id])}}">ویرایش</a>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نام مقام</th>
                                    <th>توضیحات</th>
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
