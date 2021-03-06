@extends('app.layouts.master')


@section('content')

    <div class="card card-dark">
        <div class="card-header">
            <div class="card-title">ویرایش:{{$user->name}}</div>
        </div>
        <div class="card-body">
            <form class="form-group" action="{{route('addresses.update',['address'=>$address->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                @include('app.layouts.errors')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="city_id">شهر:</label>
                            <select id="city_id" name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->title}}-{{$city->state->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="body">آدرس:</label>
                            <textarea class="form-control" id="body" name="body" rows="5" placeholder="لطفا آدرس خود را وارد کنید">{{$address->body}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">ویرایش</button>
                </div>
            </form>

        </div>
    </div>
@endsection
