@extends('templates.mnglayout')

@section('title', 'AEPM Assign Policy')

@section('sectionname', 'AEPM Assign Policy')

@section('content')

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-2 text-left">
                <a href="{{ url ('/manager/policy/assignment') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-sm-9">
                @foreach($name as $n)
                    <h4>{{ $n->policy_name }} </h4>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" style="padding: 10px;">
                <ul class="list-group">
                    @foreach($adg as $a)
                        <li class="list-group-item">
                            <input type="checkbox" disabled style="margin-right: 10px;">{{$a->adgroup_name}}
                            <div style="float: right">
                                <a class="btn btn-sm btn-primary text-white">set</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6" style="padding: 10px;">
                <ul class="list-group">
                    @foreach($addr as $ad)
                        <li class="list-group-item">
                            <input type="checkbox" disabled style="margin-right: 10px;"> {{$ad->email}}
                            <div style="float: right">
                                <a class="btn btn-sm btn-primary text-white">set</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

@endsection

@section('footer')
    @parent

@endsection