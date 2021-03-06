@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست کاربران</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">لیست کاربران</li>
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
                                    <h3 class="card-title ">کاربران</h3>
                                </div>
                                <div class="col-sm-2">
                                    <div class="btn-group">
                                        <a href="{{route('roles.index')}}" class="btn btn-primary ">نقش های کاربران</a>
                                        <a href="{{route('level.index')}}" class="btn btn-success ">کاربران مدیریت</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>نام کاربر</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <form class="form-group" action="{{route('users.destroy',['user'=>$user->id])}}" method="post" >
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form class="form-group" action="{{route('users.setAdmin',['user'=>$user->id])}}" method="post">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-sm btn-success">تبدیل به ادمین</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>نام کاربر</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
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
