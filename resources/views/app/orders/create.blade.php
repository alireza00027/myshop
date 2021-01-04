@extends('app.layouts.master')
@section('content')


    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>سفارش</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cart_area section_padding" dir="rtl">
        <div class="container">
            @include('app.layouts.errors')
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('productsImages/'.($item->getProduct())->getThumbImage())}}" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{($item->getProduct())->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{($item->getProduct())->price}} تومان</h5>
                                </td>
                                <td>
                                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                                      class="input-text qty input-number" />
                                    <button
                                      class="increase input-number-increment items-count" type="button">
                                      <i class="ti-angle-up"></i>
                                    </button>
                                    <button
                                      class="reduced input-number-decrement items-count" type="button">
                                      <i class="ti-angle-down"></i>
                                    </button> -->
                                    <h5>{{$item->product_count}}</h5>
                                </td>
                                <td>
                                    <h5>{{(($item->getProduct())->price)*$item->product_count}}</h5>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <form class="form-control" action="{{route('orders.store')}}" method="post">
                        {{csrf_field()}}
                        @include('app.layouts.errors')
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header card-primary">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>آدرس های شما</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4>مجموع:<input name="total_price" value="{{$sumCartItemsPrice}}" ></h4>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table-info col-12">
                                                    <thead>
                                                    <tr>
                                                        <th>استان</th>
                                                        <th>شهر</th>
                                                        <th>آدرس</th>
                                                        <th>انتخاب</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->addresses as $address)
                                                        <tr>
                                                            <td>{{$address->city->state->title}}</td>
                                                            <td>{{$address->city->title}}</td>
                                                            <td>{{$address->body}}</td>
                                                            <td>
                                                                <div class="form-control">
                                                                    <input type="radio" id="address_id" name="address" value="{{$address->id}}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="checkout_btn_inner float-right">
                                <button type="submit" class="btn_1" href="{{route('orders.store')}}">ثبت سفارش</button>
                                <a class="btn_1 checkout_btn_1" href="{{route('carts.show')}}">بازگشت به سبد خرید</a>
                                <a class="btn_1 checkout_btn_1" href="{{route('addresses.create')}}">افزودن آدرس جدید</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    </section>



@endsection
