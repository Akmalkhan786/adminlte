@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="user-profile">User Profile</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/uploads/user/{{$user->image}}" class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h3 style="text-align: center;">User Information</h3>
                            <br>
                            <label>User Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-light-blue"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" value="{{$user->name}}" disabled>
                            </div>
                            <br>
                            <label>Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-light-blue"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="text" class="form-control" value="{{$user->email}}" disabled>
                            </div>
                            <br>
                            <label>Phone:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-light-blue"><span class="glyphicon glyphicon-phone"></span></span>
                                <input type="text" class="form-control" value="{{$user->phone}}" disabled>
                            </div>
                            <br>
                            <label>Status:</label>
                            @if($user->status == 0)
                                <span class="badge bg-red">Not Active</span>
                            @else
                                <span class="badge bg-green">Active</span>
                            @endif
                            <br>
                            <label>Created At:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-light-blue"><span class="glyphicon glyphicon-time"></span></span>
                                <input type="text" class="form-control" value="{{$user->created_at->diffForHumans()}}" disabled>
                            </div>
                            <br>
                            <label>Updated At:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-light-blue"><span class="glyphicon glyphicon-time"></span></span>
                                <input type="text" class="form-control" value="{{$user->updated_at->diffForHumans()}}" disabled>
                            </div>
                            <br>
                            <label>User Roles:</label><br>
                            <span class="glyphicon glyphicon-th-list"></span>
                            @foreach($user->roles as $role)
                                {{$role->name}},
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection