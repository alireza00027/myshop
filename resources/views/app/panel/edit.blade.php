@extends('app.layouts.master')


@section('content')

    <div class="card card-dark">
        <div class="card-header">
            <div class="card-title">{{$user->name}}</div>
        </div>
        <div class="card-body">
            <form class="form-group" action="{{route('user.update',['user'=>$user->id])}}" method="post">
               {{csrf_field()}}
                {{method_field('PATCH')}}
                @include('app.layouts.errors')
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input class="form-control" id="name" name="name" placeholder="لطفا نام کاربری خود را وارد کنید" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input class="form-control" id="email" name="email" placeholder="لطفا ایمیل خود را وارد کنید" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="mobile">تلفن همراه</label>
                    <input class="form-control" id="mobile" name="mobile" placeholder="لطفا شماره تلفن همراه خود را وارد کنید" value="{{$user->mobile}}">
                </div>
                <div class="form-group">
                    <label for="card_number">شماره کارت</label>
                    <input class="form-control" id="card_number" name="card_number" placeholder="لطفا شماره کارت خود را وارد کنید" value="{{$user->card_number}}">
                </div>
                <div class="form-group">
                    <button class="btn-primary" type="submit">ویرایش</button>
                </div>
            </form>

        </div>
    </div>

@endsection
