@extends('templates.mnglayout')

@section('title', 'AEPM AD an Email Address')

@section('sectionname', 'AEPM Add an Email Address')

@section('content')

    <div class="container container-fluid">

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-sm-10">
                <h4 class="text-left">Add Email Address</h4>
            </div>
            <div class="col-sm-2 text-right">
                <a href="/manager/address" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
        <form action="/manager/address/new" method="post">

            {{csrf_field()}}

            <div class="form-group">
                <label for="address">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Insert an Email Address" class="form-control">
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