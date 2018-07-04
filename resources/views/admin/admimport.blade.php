@extends('templates.admlayout')

@section('title', 'AEPM Import')

@section('sectionname', 'AEPM Import Addresses and Groups')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 style="margin-bottom: 20px;">Import AD Groups from csv</h4>
                <form class="form-group" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class=" form-control form-control-sm" type="file">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4 style="margin-bottom: 20px;">Import Email addresses from csv</h4>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @parent

@endsection