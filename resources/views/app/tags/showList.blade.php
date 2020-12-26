@extends('app.layouts.master')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>لیست محصولات</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="جست و جو">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">دسته ها <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">دسته 1</a></p>
                                    <p><a href="#">دسته 2</a></p>
                                    <p><a href="#">دسته 3</a></p>
                                    <p><a href="#">دسته 4</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">مدل <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">مدل 1</a></p>
                                    <p><a href="#">مدل 2</a></p>
                                    <p><a href="#">مدل 3</a></p>
                                    <p><a href="#">مدل 4</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_product_item">
                                        <img class="img-fluid" src="{{asset('productsImages/'.$product->getThumbImage())}}">
                                        <h3> <a href="{{$product->path()}}">{{$product->name}}</a> </h3>
                                        <div class="col-sm-6">
                                            <div class="card-title">
                                                {{$product->description}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="btn-group-sm">
                                                    <a class="btn btn-primary" href="{{$product->path()}}">جزئیات بیشتر</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>قیمت:{{$product->price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

@endsection
