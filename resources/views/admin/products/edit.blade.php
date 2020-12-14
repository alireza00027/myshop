@extends('admin.master')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش</h1>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h3 class="card-title">ویرایش محصول</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('products.update',['product'=>$product->id])}}" enctype="multipart/form-data" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                @include('admin.section.errors')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">نام محصول</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="نام محصول را وارد کنید" value="{{$product->name}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="description">توضیحات کوتاه</label>
                                        <textarea rows="6" type="text" class="form-control" id="description" name="description" placeholder="توضیحات کوتاه را وارد کنید" >{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">ارسال تصویر</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="images">انتخاب تصویر</label>
                                                <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    @foreach( $product->getImages() as $image)
                                                        <div class="col-sm-3">
                                                            <label class="control-label">
                                                                <img  src="{{asset('productsImages/'.$image) }}" width="100%">
                                                            </label>
                                                            <button class="btn btn-sm btn-danger">حذف</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <label for="count">تعداد محصول</label>
                                            <input type="number" class="form-control" id="count" name="count" placeholder="تعداد محصول را وارد کنید" value="{{$product->count}}" >
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="price">قیمت محصول</label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="قیمت محصول را وارد کنید" value="{{$product->price}}" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="category_id">انتخاب دسته</label>
                                                <select multiple id="category_id" name="category_id[]" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"{{in_array(trim($category->id),$product->categories->pluck('id')->toArray())?'selected':''}}>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="tag_id">انتخاب برچسب</label>
                                                <select multiple id="tag_id" name="tag_id[]" class="form-control">
                                                    <option value="0">بدون برچسب</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->id}}"{{in_array(trim($tag->id),$product->tags->pluck('id')->toArray())?'selected':''}}>{{$tag->title}}</option>
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-primary").click(function(){
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".hdtuto control-group lst").remove();
        });
    </script>

@endsection
