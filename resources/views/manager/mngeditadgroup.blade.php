@extends('templates.mnglayout')

@section('title', 'AEPM Edit AD Group')

@section('sectionname', 'AEPM Edit AD Group')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Edit AD Group</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/adgroup" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/adgroup/update/{{$adgroup->id}}" method="post">

            {{csrf_field()}}
            {!! method_field('PATCH') !!}

            <input type="hidden" value="">
            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="adgroup_name" id="adgroup_name" class="form-control" value="{{$adgroup->adgroup_name}}">
                <label for="domain">Domain</label>
                <input type="text" name="description" id="description" class="form-control" value="{{$adgroup->description}}">
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