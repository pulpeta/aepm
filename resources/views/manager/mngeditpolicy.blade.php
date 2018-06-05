@extends('templates.mnglayout')

@section('title', 'AEPM Edit Policy')

@section('sectionname', 'AEPM Edit Policy')

@section('content')

    @foreach($policy as $p)

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
                <form class="form-inline" action="{{url ('/manager/policy/update/'.$p->id) }}" method="post">

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

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-12">
                <h6>Related Actions</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <form class="form-group">

                    <select class="form-control mb-2 mr-sm-2">
                        @foreach($list_action as $l)
                            <option value="{{$l->id}}">{{$l->action}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-primary mb-2">Add Action</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-1">

                    </div>
                    <div class="col-sm-3">
                        Priority
                    </div>
                    <div class="col-sm-9">
                        Action
                    </div>
                    <div class="col-sm-1">

                    </div>
                </div>
                @foreach($action as $a)
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-sm-1">
                            <form action="{{ url('/manager/policy/activeaction/'.$a->id) }}" method="POST" name="activeaction">
                                {!! csrf_field() !!}
                                {!! method_field('PATCH') !!}

                                @if($a->is_active)
                                    <button class="btn btn-success btn-sm"><span class="far fa-arrow-up"></span></button>
                                @else
                                    <button class="btn btn-warning btn-sm"><span class="far fa-arrow-down"></span></button>
                                @endif
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <form>
                                <input value="{{$a->priority}}">
                                <button>Update</button>
                            </form>
                        </div>
                        <div class="col-sm-3">
                            {{$a->action}}
                        </div>
                        <div class="col-sm-1 text-left">
                            <form action="{{ url('/manager/policy/removeaction/'.$a->id) }}" method="POST" name="removeaction">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm"><span class="far fa-minus"></span></button>
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