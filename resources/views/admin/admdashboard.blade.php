@extends('templates.admlayout')

@section('title', 'Admin Dashboard')

@section('sectionname', 'Admin Dashboard')

@section('content')

    @foreach($lists as $list)

        <div class="row">
            <div class="col-sm-12" style="margin-bottom: 30px;">
                <h3 class="text-left">Traffic Amount Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 text-center">
                <h4>In</h4>
                <h5 class="text-center text-success">aeMail</h5>
                <p class="text-success" style="font-size: large;">
                    {{$list->encrypted_in}}
                </p>
                <h5 class="text-center text-warning">email</h5>
                <p class="text-warning" style="font-size: large;">
                    {{$list->standard_in}}
                </p>
            </div>
            <div class="col-sm-8 text-center">
                grafico
            </div>
            <div class="col-sm-2 text-center">
                <h4>Out</h4>
                <h5 class="text-center text-success">aeMail</h5>
                <p class="text-success" style="font-size: large;">
                    {{$list->encrypted_out}}
                </p>
                <h5 class="text-center text-warning">email</h5>
                <p class="text-warning" style="font-size: large;">
                    {{$list->standard_out}}
                </p>
            </div>
        </div>

    @endforeach

@stop