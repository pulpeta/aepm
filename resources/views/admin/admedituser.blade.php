@extends('templates.admlayout')

@section('title', 'Users List')

@section('sectionname', 'Users List')

@section('content')

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-12 text-center">
            <button class="btn btn-sm btn-primary">Add User</button>
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-6">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h4>Administrators</h4>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-sm-12">
                    @foreach($admins as $admin)
                        <div class="row">
                            @if($admin->is_enabled)
                            <div class="col-sm-4">
                                {{$admin->name}}
                            </div>
                            @else
                                <div class="col-sm-4 text-muted">
                                    {{$admin->name}}
                                </div>
                            @endif
                                @if($admin->is_enabled)
                                    <div class="col-sm-4">
                                        enabled
                                    </div>
                                @else
                                    <div class="col-sm-4 text-muted">
                                        disabled
                                    </div>
                                @endif
                            <div class="col-sm-4 text-right">
                                <a href="#"><span class="far fa-pencil-alt text-success"></span></a>
                                <a href="#" style="color: red; margin-left: 10px;"><span class="far fa-trash text-danger"></span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h4>Operators</h4>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-sm-12">
                    @foreach($operators as $operator)
                        <div class="row">
                            @if($operator->is_enabled)
                                <div class="col-sm-4">
                                    {{$operator->name}}
                                </div>
                            @else
                                <div class="col-sm-4 text-muted">
                                    {{$operator->name}}
                                </div>
                            @endif
                            @if($operator->is_enabled)
                                <div class="col-sm-4">
                                    enabled
                                </div>
                            @else
                                <div class="col-sm-4 text-muted">
                                    disabled
                                </div>
                            @endif
                            <div class="col-sm-4 text-right">
                                <a href="#"><span class="far fa-pencil-alt text-success"></span></a>
                                <a href="#" style="color: red; margin-left: 10px;"><span class="far fa-trash text-danger"></span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop