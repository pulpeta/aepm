@extends('templates.mnglayout')

@section('title', 'AEPM Edit Email Address')

@section('sectionname', 'AEPM Edit Email Address')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Edit Email Address</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/address" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/address/update/{{$address->id}}" method="post">

            {{csrf_field()}}
            {!! method_field('PATCH') !!}

            <input type="hidden" value="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="form-control" value="{{$address->email}}">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>


    </div>

@endsection

@section('footer')
    @parent

@endsection