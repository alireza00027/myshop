@extends('app.layouts.master')


@section('content')

    <div class="card card-dark">
        <div class="card-header">
            <div class="card-title">{{$user->name}}</div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="email">ایمیل</label>
                <input class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
            </div>
            <div class="form-group">
                <label for="mobile">تلفن همراه</label>
                <input class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" disabled>
            </div>
            <div class="form-group">
                <label for="email">شماره کارت</label>
                <input class="form-control" id="email" name="email" value="{{$user->card_number}}" disabled>
            </div>

        </div>
        <div class="card-footer">
            <div class="checkout_btn_inner float-right">
                <a class="btn_1 checkout_btn_1" href="{{route('user.edit',['user'=>$user->id])}}">ویرایش اطلاعات</a>
                <a class="btn_1" href="{{route('addresses.index')}}">آدرس های شما</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header card-primary">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>آدرس های شما</h4>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->addresses as $address)
                                    <tr>
                                        <td>{{$address->city->state->title}}</td>
                                        <td>{{$address->city->title}}</td>
                                        <td>{{$address->body}}</td>
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

@endsection
