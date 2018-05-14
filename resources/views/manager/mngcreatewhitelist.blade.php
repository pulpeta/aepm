@extends('templates.mnglayout')

@section('title', 'AEPM Whitelist')

@section('sectionname', 'AEPM Add a Domain')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Add Domain</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/whitelist" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/whitelist/new" method="post">

            {{csrf_field()}}

            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="domain" id="domain" placeholder="Insert a Domain name or a key to filter" class="form-control">
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