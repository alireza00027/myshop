@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>مدیران سایت</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">مدیران سایت</li>
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
                                    <h3 class="card-title ">مدیران</h3>
                                </div>
                                <div class="col-sm-2">
                                    <div class="btn-group">
                                        <a href="{{route('level.create')}}" class="btn btn-primary ">ثبت مقام برای کاربر</a>
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
                                    <th>مقام</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    @if(count($role->users))
                                        @foreach($role->users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$role->name}}/{{$role->label}}</td>
                                                <td>
                                                    <form class="form-group" action="{{route('level.destroy',['user'=>$user->id])}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="btn-group btn-group-sm mt-2">
                                                            <a href="{{route('level.edit',['user'=>$user->id])}}" class="btn btn-primary">ویرایش</a>
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
