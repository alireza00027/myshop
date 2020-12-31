@extends('admin.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست شهر ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">لیست شهر ها</li>
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
                                <div class="col-sm-11">
                                    <h3 class="card-title justify-content-center"> شهر ها</h3>
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{route('cities.create')}}" class="btn btn-warning">افزودن شهر</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>عنوان شهر</th>
                                    <th>استان</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->title}}</td>
                                        <td>{{$city->state->title}}</td>
                                        <td>
                                            <form class="form-group" action="{{route('cities.destroy',['city'=>$city->id])}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <div class="btn-group btn-group-sm mt-2">
                                                    <a href="{{route('cities.edit',['city'=>$city->id])}}" class="btn btn-primary">ویرایش</a>
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>عنوان شهر</th>
                                    <th>استان</th>
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
