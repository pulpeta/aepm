@extends('templates.mnglayout')

@section('title', 'AEPM AD Groups')

@section('sectionname', 'AEPM Add an AD Group')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Add AD an Group</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/adgroup" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/adgroup/new" method="post">

            {{csrf_field()}}

            <div class="form-group">
                <label for="adgroup">Domain</label>
                <input type="text" name="adgroup_name" id="adgroup_name" placeholder="Insert an AD Group name" class="form-control">
                <label for="description">Domain</label>
                <input type="text" name="description" id="description" placeholder="Description" class="form-control">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>


    </div>

@endsection

@section('footer')
    @parent

@endsection