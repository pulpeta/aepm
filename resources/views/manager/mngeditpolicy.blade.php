@extends('templates.mnglayout')

@section('title', 'AEPM Edit Policy')

@section('sectionname', 'AEPM Edit Policy')

@section('content')

    @if(session()->has('message'))
        @component('components.alert-info')
            {{ session()->get('message') }}
        @endcomponent
    @endif

    @foreach($policy as $p)

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-11 text-left">
                <a href="{{ url ('/manager/policy') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 text-left">
                <form action="{{ url('/manager/policy/enablepolicy/'.$p->id) }}" method="POST" name="enablepolicy">
                    {!! csrf_field() !!}
                    {!! method_field('PATCH') !!}

                    @if($p->is_enabled)
                        <button class="btn btn-success"><span class="far fa-arrow-up"></span></button>
                    @else
                        <button class="btn btn-warning"><span class="far fa-arrow-down"></span></button>
                    @endif
                </form>
            </div>
            <div class="col-sm-11 text-left">
                <form class="form-inline" action="{{url ('/manager/policy/update/'.$p->id) }}" method="post" name="update">

                    {{csrf_field()}}
                    {!! method_field('PATCH') !!}

                    <input class="form-control mb-2 mr-sm-2" type="text" name="policy_name" id="policy_name" value="{{ $p->policy_name }}">

                    <input class="form-control mb-2 mr-sm-2" type="text" name="description" id="description" value="{{ $p->description }}">

                    <button class="btn btn-primary mb-2">Update</button>

                </form>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-3">
                    Created at: {{$p->created_at}}
                </div>
                <div class="col-sm-3">
                    Updated at: {{$p->updated_at}}
                </div>
                <div class="col-sm-5">

                </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-11 text-center">
                <form class="form-inline"  action="{{url ('/manager/policy/addaction/'.$p->id) }}" method="post" name="addaction">

                    {{csrf_field()}}

                    <select class="form-control mb-2 mr-sm-2" name="action_id">
                        @foreach($list_action as $l)
                            <option value="{{$l->id}}" >{{$l->action}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary mb-2"><span class="fa fa-plus"></span></button>
                </form>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-1"></div>
            <div class="col-sm-11">
                <h6>Related Actions</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-11">

                @foreach($action as $a)
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-sm-1">
                            <form action="{{ url('/manager/policy/activeaction/'.$a->id) }}" method="POST" class="form-group">

                                {!! csrf_field() !!}
                                {!! method_field('PATCH') !!}

                                @if($a->is_active)
                                    <button class="btn btn-success btn-sm"><span class="far fa-arrow-up"></span></button>
                                @else
                                    <button class="btn btn-warning btn-sm"><span class="far fa-arrow-down"></span></button>
                                @endif
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <form class="form-inline" action="{{ url('/manager/policy/setactionpriority/'.$a->id) }}" method="POST">

                                {!! csrf_field() !!}
                                {!! method_field('PATCH') !!}

                                <input  name="priority" id="priority" class="form-control form-control-sm mb-2 mr-sm-2 text-right" value="{{$a->priority}}" style="max-width: 50px;">
                                <button class="btn btn-sm btn-primary mb-2 mr-sm-2"><span class="fa fa-check-circle"></span></button>
                            </form>
                        </div>
                        <div class="col-sm-3">
                            {{$a->action}}
                        </div>
                        <div class="col-sm-6 text-left">
                            <form action="{{ url('/manager/policy/removeaction/'.$a->id) }}" method="POST">

                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button class="btn btn-danger btn-sm mb-2 mr-sm-2"><span class="far fa-minus"></span></button>
                            </form>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

    @endforeach

@endsection

@section('footer')
    @parent

@endsection