@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش نقش</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش نقش</li>
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
                            <form role="form" action="{{route('roles.update',['role'=>$role->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                @include('admin.section.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">عنوان نقش</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="عنوان نقش را وارد کنید" value="{{$role->name}}" >
                                        <label for="label">توضیحات نقش</label>
                                        <input type="text" class="form-control" id="label" name="label" placeholder="توضیحات نقش را وارد کنید" value="{{$role->label}}" >
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="permission_id">انتخاب دسترسی ها</label>
                                                <select multiple id="permission_id" name="permission_id[]" class="form-control" >
                                                    @foreach(\App\Permission::latest()->get() as $permission)
                                                        <option value="{{$permission->id}}" {{in_array(trim($permission->id),$role->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}}/{{$permission->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
