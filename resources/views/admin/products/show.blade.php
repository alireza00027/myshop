@extends('admin.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>محصول</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش محصول</li>
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
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">{{$product->name}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="card card-success ">
                                    <div class="card-header">
                                        <h3 class="card-title">تصاویر</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($product->getImages() as $image)
                                                <div class="col-sm-4">
                                                    <img src="{{asset('productsImages/'.$image) }}" width="100%">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">مشخصات</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <label>توضیحات</label>
                                                   <textarea class="form-control"  disabled="">{{$product->description}}</textarea>
                                               </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>تعداد</label>
                                                <input type="number" class="form-control" disabled="" value="{{$product->count}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>قیمت</label>
                                                <input type="text" class="form-control" disabled="" value="{{$product->price}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>تعداد بازدید</label>
                                                <input type="number" class="form-control" disabled="" value="{{$product->view_count}}">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <div class="card card-success">
                                                    <div class="card-header">دسته های محصول</div>
                                                    <div class="card-body">
                                                        <ul>
                                                            @foreach($categories as $category)
                                                                <li>{{$category->title}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card card-success">
                                                    <div class="card-header">برچسب های محصول</div>
                                                    <div class="card-body">
                                                        <ul>
                                                            @foreach($tags as $tag)
                                                                <li>{{$tag->title}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">ویژگی ها</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <ul>
                                                    @foreach($product->metas as $meta)
                                                        <li class="row">
                                                            <div class="col-sm-6">
                                                                {{$meta->key.':'.$meta->value}}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <form class="form-group" action="{{route('metas.destroy',['meta'=>$meta->id])}}" method="post">
                                                                    {{method_field('delete')}}
                                                                    {{csrf_field()}}
                                                                    <div class="btn-group btn-group-sm mt-2">
                                                                        <a href="{{route('metas.edit',['meta'=>$meta->id])}}" class="btn btn-primary">ویرایش</a>
                                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-sm-4">
                                            <a href="{{route('meta.insert',['product'=>$product->id])}}" class="btn btn-warning">افزودن ویژگی</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-4">
                                    <form class="form-group" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="btn-group btn-group-lg mt-2">
                                            <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-primary">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                    </form>
                                </div>
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
