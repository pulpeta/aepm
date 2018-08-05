@extends('templates.admlayout')

@section('title', 'Options Area')

@section('sectionname', 'Options Area')

@section('content')

    @if(session()->has('message'))
        @component('components.alert-info')
            {{ session()->get('message') }}
        @endcomponent
    @endif

    <div class="row">
        <div class="col-sm-4 text-left">
            <h4>Upload License File</h4>
            <form class="form-group" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control-sm" type="file">
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary">Upload File</button>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <h4>System Backup</h4>
            <p>Work in Progress</p>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-12" style="font-size: x-small">
            <h6 style="font-size: small">License Status</h6>
            if ok sfondo verde e data scadenza 0 giorni rimanenti
            else sfondo warning licenza scaduta
            else sfondo danger file licenza mancante
        </div>
    </div>

@endsection

@section('footer')
    @parent

@endsection