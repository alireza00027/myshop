@extends('app.layouts.master')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>صفحه داخلی محصول</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="5000" dir="ltr">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('productsImages/'.$product->getThumbImage())}}" class="d-block w-100">
                            </div>
                            @foreach($product->getImages() as $image)
                                <div class="carousel-item">
                                    <img src="{{asset('productsImages/'.$image) }}" class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#mycarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#mycarousel" data-slide="next" >
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>{{$product->name}}</h3>
                        <p>
                            {{$product->description}}
                        </p>
                        <div class="card_area">
                            <div class="product_count_area">
                                <div class="form-group">
                                    <ul>
                                        @foreach($product->metas as $meta)
                                            <li>{{$meta->key.':'.$meta->value}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <form action="#">

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

@endsection
