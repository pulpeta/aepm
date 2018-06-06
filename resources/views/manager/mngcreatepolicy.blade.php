@extends('templates.mnglayout')

@section('title', 'AEPM Create Policy')

@section('sectionname', 'AEPM Create Policy')

@section('content')

        <div class="row">
            <div class="col-sm-1 text-left">

            </div>
            <div class="col-sm-11 text-left">
                <form class="form-inline" action="{{url ('/manager/policy/new') }}" method="post">

                    {{csrf_field()}}

                    <input class="form-control mb-2 mr-sm-2" type="text" name="policy_name" id="policy_name" placeholder="Policy Name">

                    <input class="form-control mb-2 mr-sm-2" type="text" name="description" id="description" placeholder="Description">

                    <button class="btn btn-primary mb-2">Save</button>

                </form>
            </div>
        </div>

@endsection

@section('footer')
    @parent

@endsection