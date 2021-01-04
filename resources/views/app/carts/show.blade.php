@extends('app.layouts.master')
@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>سبد خرید</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Cart Area =================-->
    <section class="cart_area section_padding" dir="rtl">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">جمع کل</th>
                            <th scope="col">حذف</th>
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
                                <td>
                                    <form action="{{route('cartItems.destroy',['cartItem'=>$item->id])}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn-sm btn-dark">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>مجموع</td>
                                <td>
                                    <input name="total_price" value="{{$sumCartItemsPrice}}" disabled>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1 checkout_btn_1" href="{{route('products.list')}}">افزودن به سبد خرید</a>
                        <a class="btn_1" href="{{route('orders.create')}}">ادامه خرید</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->


@endsection
