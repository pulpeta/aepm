@extends('templates.admlayout')

@section('title', 'Edit User')

@section('sectionname', 'Edit User')

@section('content')

    @if(session()->has('message'))
        @component('components.alert-info')
            {{ session()->get('message') }}
        @endcomponent
    @endif

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
                    <input type="password" class="form-control" name="pw" id="pw" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="cpw" id="cpw">
                </div>
                <div class="form-group form-check form-check-inline">
                    <label class="form-check-label" for="isadmin">Administrator
                        @if($user->is_admin == 1)
                            <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" checked>
                        @elseif($user->is_admin == 0)
                            <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin">
                        @endif
                    </label>
                </div>
                <div class="form-group form-check form-check-inline">
                    <label class="form-check-label" for="isenabled">Enabled
                        @if($user->is_enabled == 1)
                            <input type="checkbox" class="form-check-input" name="is_enabled" id="is_enabled" checked>
                        @elseif($user->is_enabled == 0)
                            <input type="checkbox" class="form-check-input" name="is_enabled" id="is_enabled">
                        @endif
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
