@extends('app.layouts.master')


@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>MyShop</h1>
                            <p>ما نمیگوئیم بهترین هستیم اما بهترین ها به سراغ ما می آیند</p>
                            <a href="{{route('products.list')}}" class="btn_1">همین الان خرید کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="{{asset('images/photo-1608306680608-9dbd68c8a506.jfif')}}" alt="#" class="img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($products as $product)
                        <div class="single_product_iner">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_product_img">
                                        <img src="{{asset('productsImages/'.$product->getThumbImage())}}" class="img-fluid" alt="#">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div class="single_product_content">
                                        <h5>شروع قیمت از 4000000 تومان</h5>
                                        <h2> <a href="{{$product->path()}}">{{$product->name}}</a></h2>
                                        <a href="{{route('products.list')}}" class="btn_3">امتحان کنید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>محصولات جدید</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">
                            <div class="single_product_item_thumb">
                                <img src="{{asset('productsImages/'.$product->getThumbImage())}}" alt="#" class="img-fluid d-block">
                            </div>
                            <h3> <a href="{{$product->path()}}">{{$product->name}}</a> </h3>
                            <p>{{$product->price}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- trending item end-->


@endsection
