@extends('app.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header card-primary">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>آدرس های شما</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <a class="btn btn-warning" href="{{route('addresses.create')}}">افزودن آدرس جدید</a>
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
                                                <th>تنظیمات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($addresses as $address)
                                                <tr>
                                                    <td>{{$address->city->state->title}}</td>
                                                    <td>{{$address->city->title}}</td>
                                                    <td>{{$address->body}}</td>
                                                    <td>
                                                        <form class="form-group" action="{{route('addresses.destroy',['address'=>$address->id])}}" method="post">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                            <div class="btn-group btn-group-sm mt-2">
                                                                <a href="{{route('addresses.edit',['address'=>$address->id])}}" class="btn btn-primary">ویرایش</a>
                                                                <button type="submit" class="btn btn-danger">حذف</button>
                                                            </div>
                                                        </form>
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
            </div>
        </div>
    </div>

@endsection
