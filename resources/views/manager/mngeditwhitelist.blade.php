@extends('templates.mnglayout')

@section('title', 'AEPM Whitelist')

@section('sectionname', 'AEPM Whitelist')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Edit Domain</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/whitelist" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/whitelist/update/{{$domain->id}}" method="post">

            {{csrf_field()}}
            {!! method_field('PATCH') !!}

            <input type="hidden" value="">
            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="domain" id="domain" class="form-control" value="{{$domain->domain}}">
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