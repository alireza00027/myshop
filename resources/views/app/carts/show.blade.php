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
                                    <div class="product_count" dir="ltr">
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
                                        <input type="number" name="product_count">
                                    </div>
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

                        <tr class="bottom_button">
                            <td>
                                <a class="btn_1" href="{{route('products.list')}}">اضافه کردن به سبد</a>
                            </td>

                            <td>
                                <div class="cupon_text float-right">
                                    <a class="btn_1" href="#">عدم استفاده از کد تخفیف </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>مجموع</h5>
                            </td>
                            <td>
                                <h5>500000 تومان</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area"  dir="ltr">
                            <td></td>
                            <td></td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <div class="shipping_box" >
                                    <ul class="list">
                                        <li>
                                            تعرفه ثابت: 30000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            ارسال کالای رایگان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li>
                                            تعرفه ثابت: 30000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                        <li class="active">
                                            تحویل محلی: 20000 تومان
                                            <input type="radio" aria-label="Radio button for following text input">
                                        </li>
                                    </ul>
                                    <h6>
                                        هزینه ارسال کالا
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </h6>
                                    <select class="shipping_select" >
                                        <option value="1">ایران</option>
                                        <option value="2">هند</option>
                                        <option value="4">پاکستان</option>
                                    </select>
                                    <select class="shipping_select section_bg" >
                                        <option value="1">یک منطقه را انتخاب کنید</option>
                                        <option value="2">یک منطقه را انتخاب کنید</option>
                                        <option value="4">یک منطقه را انتخاب کنید</option>
                                    </select>
                                    <input class="post_code" type="text" placeholder="کدپستی" />
                                    <div class="form-group">
                                        <textarea class="form-control post_code" type="text" name="address" placeholder="آدرس"></textarea>
                                    </div>
                                    <a class="btn_1" href="#">ویرایش جزئیات</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="#">ادامه خرید</a>
                        <a class="btn_1 checkout_btn_1" href="#">رفتن به قسمت چک کردن محصول</a>
                    </div>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->


@endsection
