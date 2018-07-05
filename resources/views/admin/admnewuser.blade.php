@extends('templates.admlayout')

@section('title', 'Edit User')

@section('sectionname', 'Edit User')

@section('content')

    <div class="row text-center" style="margin-bottom: 20px;">
        <div class="col-sm-12">
            <a class="btn btn-primary btn-sm" href="{{'/admin/users'}}">Back to Users</a>
        </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="{{ url ('/admin/users/update/'.$user->id)}}" method="post">
                {{csrf_field()}}
                {!! method_field('PATCH') !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                </div>
                <div class="form-group form-check form-check-inline">
                    <label class="form-check-label" for="isadmin">Administrator
                        <input type="checkbox" class="form-check-input" name="isadmin" id="isadmin" checked="{{$user->is_admin}}">
                    </label>
                </div>
                <div class="form-group form-check form-check-inline">
                    <label class="form-check-label" for="isenabled">Enabled
                        <input type="checkbox" class="orm-check-input" name="isenabled" id="isenabled" checked="{{$user->is_enabled}}">
                    </label>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="editedat" id="editedat">
                        <button class="btn btn-sm btn-primary">Save</button>
                        <button class="btn btn-sm">Reset</button>
                </div>

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>



@endsection
